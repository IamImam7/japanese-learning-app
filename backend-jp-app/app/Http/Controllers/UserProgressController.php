<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserProgressResource;

class UserProgressController extends Controller
{
    public function index(){
        $user = Auth::user();

        $progress = UserProgress::where('user_id', $user->id)->with('progressable')->get();

        return UserProgressResource::collection($progress);
    }
    private function calculateNextReviewDays($masteryLevel, $reviewCount){
         // Algorithm spaced repetition sederhana berdasarkan SM-2
    $intervals = [
        0 => 1,    // Baru dipelajari: 1 hari
        1 => 1,    // Level 1: 1 hari
        2 => 3,    // Level 2: 3 hari
        3 => 7,    // Level 3: 1 minggu
        4 => 16,   // Level 4: 16 hari
        5 => 35,   // Level 5: 35 hari (dianggap mastered)
    ];

    // Jika sudah beberapa kali direview, tambahkan factor
    $days = $intervals[$masteryLevel] ?? 1;
    if ($reviewCount > 0) {
        $days = $days * (1 + ($reviewCount * 0.5));
    }

     return ceil($days);
    }

    public function updateProgress(Request $request)
{
    $request->validate([
        'item_id' => 'required|integer',
        'item_type' => 'required|string|in:App\Models\JapaneseCharacter,App\Models\Vocabulary,App\Models\GrammarRule',
        'mastery_level' => 'required|integer|min:0|max:5',
    ]);

    $user = Auth::user();

    // Cari progress jika ada, kalau tidak buat baru
    $progress = UserProgress::firstOrNew([
        'user_id' => $user->id,
        'progressable_id' => $request->item_id,
        'progressable_type' => $request->item_type,
    ]);

    // Update field progress
    $progress->mastery_level = $request->mastery_level;
    $progress->last_reviewed = now();
    $progress->review_count = ($progress->review_count ?? 0) + 1;

    // Hitung next review pakai review_count terbaru
    $progress->next_review = now()->addDays(
        $this->calculateNextReviewDays($request->mastery_level, $progress->review_count)
    );

    $progress->save();

    return new UserProgressResource($progress->load('progressable'));
}


   public function getStats(){
    $user = Auth::user();

    // Ambil semua progress user beserta relasi
    $progress = UserProgress::where('user_id', $user->id)
        ->with('progressable')
        ->get();

    // Hitung total
    $total_characters_learned = $progress->where('progressable_type', 'App\Models\JapaneseCharacter')->count();
    $total_vocabulary_learned = $progress->where('progressable_type', 'App\Models\Vocabulary')->count();
    $total_grammar_rules_learned = $progress->where('progressable_type', 'App\Models\GrammarRule')->count();
    $average_mastery_level = $progress->avg('mastery_level') ?? 0;

    // Hitung per jenis karakter
    $hiragana = $progress->filter(fn($p) =>
        $p->progressable_type === 'App\Models\JapaneseCharacter'
        && $p->progressable?->type === 'hiragana'
    );
    $katakana = $progress->filter(fn($p) =>
        $p->progressable_type === 'App\Models\JapaneseCharacter'
        && $p->progressable?->type === 'katakana'
    );
    $kanji = $progress->filter(fn($p) =>
        $p->progressable_type === 'App\Models\JapaneseCharacter'
        && $p->progressable?->type === 'kanji'
    );

    // Data akhir
    $stats = [
        'total_characters_learned' => $total_characters_learned,
        'total_vocabulary_learned' => $total_vocabulary_learned,
        'total_grammar_rules_learned' => $total_grammar_rules_learned,
        'average_mastery_level' => round($average_mastery_level, 2),

        'hiragana_count' => $hiragana->count(),
        'katakana_count' => $katakana->count(),
        'kanji_count' => $kanji->count(),
        'vocabulary_count' => $total_vocabulary_learned,
        'grammar_count' => $total_grammar_rules_learned,

        'hiragana_mastery' => round($hiragana->avg('mastery_level') ?? 0, 2),
        'katakana_mastery' => round($katakana->avg('mastery_level') ?? 0, 2),
        'kanji_mastery' => round($kanji->avg('mastery_level') ?? 0, 2),
        'vocabulary_mastery' => round($progress->where('progressable_type', 'App\Models\Vocabulary')->avg('mastery_level') ?? 0, 2),
        'grammar_mastery' => round($progress->where('progressable_type', 'App\Models\GrammarRule')->avg('mastery_level') ?? 0, 2),
    ];

    return response()->json([
        'data' => $stats,
        'message' => 'User stats retrieved successfully',
    ]);
}
 public function getReviewItems(Request $request)
    {
        $user = Auth::user();
        $today = now()->toDateString();

     $reviewItems = UserProgress::query()
    ->where('user_id', $user->id)
    ->whereDate('next_review', '<=', $today)
    ->with(['progressable' => function ($query) {
        $query->select('id', 'character', 'word', 'rule_name', 'meaning', 'romaji', 'reading');
    }])
    ->orderBy('next_review', 'asc')
    ->get();



        return response()->json([
            'data' => $reviewItems,
            'message' => 'Review items retrieved successfully'
        ]);
    }

    /**
     * Update progress after review
     */
    public function updateAfterReview(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
            'item_type' => 'required|string',
            'rating' => 'required|integer|min:0|max:5'
        ]);

        $user = Auth::user();

        // Find the progress record
        $progress = UserProgress::where('user_id', $user->id)
            ->where('progressable_id', $request->item_id)
            ->where('progressable_type', $request->item_type)
            ->firstOrFail();

        // Calculate new mastery level based on rating
        $newMasteryLevel = $this->calculateNewMasteryLevel($progress->mastery_level, $request->rating);

        // Update progress
        $progress->mastery_level = $newMasteryLevel;
        $progress->last_reviewed = now();
        $progress->next_review = $this->calculateNextReview($newMasteryLevel, $progress->review_count);
        $progress->review_count = $progress->review_count + 1;
        $progress->save();

        return response()->json([
            'data' => $progress,
            'message' => 'Progress updated after review'
        ]);
    }

    /**
     * Calculate new mastery level based on rating
     */
    private function calculateNewMasteryLevel($currentLevel, $rating)
    {
        // Algorithm based on SM-2 spaced repetition
        if ($rating >= 4) {
            // Good recall - increase level
            return min(5, $currentLevel + 1);
        } elseif ($rating >= 2) {
            // Moderate recall - maintain level
            return $currentLevel;
        } else {
            // Poor recall - decrease level but not below 0
            return max(0, $currentLevel - 1);
        }
    }

    /**
     * Calculate next review date based on mastery level and review count
     */
    private function calculateNextReview($masteryLevel, $reviewCount)
    {
        // Base intervals in days for each mastery level
        $baseIntervals = [
            0 => 1,    // 1 day
            1 => 2,    // 2 days
            2 => 4,    // 4 days
            3 => 7,    // 1 week
            4 => 14,   // 2 weeks
            5 => 30,   // 1 month
        ];

        // Get base interval
        $interval = $baseIntervals[$masteryLevel] ?? 1;

        // Adjust interval based on review count
        if ($reviewCount > 0) {
            $interval = $interval * (1 + ($reviewCount * 0.1));
        }

        return now()->addDays($interval);
    }
}
