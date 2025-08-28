<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizAttempt;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use App\Http\Resources\QuizResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\QuizAttemptResource;

class QuizController extends Controller
{
    public function index(Request $request){

        $query = Quiz::query();

        if($request->has('type')){
            $query->where('type', $request->type);
        }
        if($request->has('difficulty')){
            $query->where('difficulty', $request->difficulty);
        }

        $quizzes = $query->with('questions')->get();

        return QuizResource::collection($quizzes);
    }

    public function show($id){
        $quiz = Quiz::with('questions')->findOrFail($id);
        return new QuizResource($quiz);
    }

     private function calculateNextReview($masteryLevel)
    {
        // Spaced repetition algorithm
        switch ($masteryLevel) {
            case 0: return 1;
            case 1: return 2;
            case 2: return 4;
            case 3: return 7;
            case 4: return 14;
            case 5: return 30;
            default: return 1;
        }
    }
     private function updateUserProgressFromQuestion($user, $question)
    {
        // Cari item yang terkait dengan pertanyaan
        // Asumsikan setiap question memiliki item_id dan item_type
        if ($question->item_id && $question->item_type) {
            // Cari progress yang sudah ada
            $progress = UserProgress::where('user_id', $user->id)
                ->where('progressable_id', $question->item_id)
                ->where('progressable_type', $question->item_type)
                ->first();

            if ($progress) {
                // Tingkatkan mastery level (maksimal 5)
                $newLevel = min(5, $progress->mastery_level + 1);
                $progress->update([
                    'mastery_level' => $newLevel,
                    'last_reviewed' => now(),
                    'next_review' => now()->addDays($this->calculateNextReview($newLevel)),
                    'review_count' => $progress->review_count + 1
                ]);
            } else {
                // Buat progress baru
                UserProgress::create([
                    'user_id' => $user->id,
                    'progressable_id' => $question->item_id,
                    'progressable_type' => $question->item_type,
                    'mastery_level' => 1, // Level awal
                    'last_reviewed' => now(),
                    'next_review' => now()->addDays($this->calculateNextReview(1)),
                    'review_count' => 1
                ]);
            }
        }
    }
    public function submitAttempt(Request $request, $quizId){
        $request->validate([
            'answers' => 'required|array',
            'time_spent' => 'required|integer',
        ]);

        $quiz = Quiz::with('questions')->findOrFail($quizId);
        $user = Auth::user();

        $score = 0;
        $totalQuestions = $quiz->questions()->count();


        foreach($quiz->questions as $question){
            if(isset($request->answers[$question->id])){
                $userAnswer = $request->answers[$question->id];
                if($userAnswer == $question->correct_answer){
                    $score++;
                    $this->updateUserProgressFromQuestion($user, $question);
            }
        }
    }

    $attemp = QuizAttempt::create([
        'user_id' => $user->id,
        'quiz_id' => $quiz->id,
        'score' => $score,
        'total_questions' => $totalQuestions,
        'answers' => $request->answers,
        'time_spent' => $request->time_spent,
        'completed_at' => now(),
    ]);

   return new QuizAttemptResource($attemp->load('quiz.questions'));

}

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'type' => 'required|in:hiragana,katakana,kanji,vocabulary,grammar',
        'difficulty' => 'required|integer|min:1|max:5',
        'time_limit' => 'nullable|integer',
    ]);

    $quiz = Quiz::create($request->all());

    return response()->json([
        'data' => $quiz,
        'message' => 'Quiz created successfully'
    ], 201);
}

public function storeQuestion(Request $request)
{
    $request->validate([
        'quiz_id' => 'required|exists:quizzes,id',
        'question_text' => 'required|string',
        'question_type' => 'required|in:multiple_choice,fill_blank',
        'options' => 'required_if:question_type,multiple_choice|array',
        'correct_answer' => 'required|string',
        'explanation' => 'nullable|string',
    ]);

    $question = Question::create($request->all());

    return response()->json([
        'data' => $question,
        'message' => 'Question created successfully'
    ], 201);
}

public function getAllForAdmin()
{
    $quizzes = Quiz::with('questions')->get();

    return response()->json([
        'data' => $quizzes,
        'message' => 'Quizzes retrieved successfully'
    ]);
}
public function getUserAttempts(Request $request)
{
    $user = $request->user();
    $attempts = QuizAttempt::where('user_id', $user->id)
        ->with('quiz.questions')
        ->orderBy('completed_at', 'desc')
        ->get();

    return response()->json([
        'data' => $attempts,
        'message' => 'User quiz attempts retrieved successfully'
    ]);
}
public function destroy($id)
{
    $quiz = Quiz::findOrFail($id);
    $quiz->delete();

    return response()->json(['message' => 'Quiz deleted successfully']);
}
}
