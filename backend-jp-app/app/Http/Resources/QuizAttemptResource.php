<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizAttemptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'quiz_id' => $this->quiz_id,
            'score' => $this->score,
            'total_questions' => $this->total_questions,
            'percentage' => $this->total_questions > 0
            ? round(($this->score / $this->total_questions) * 100, 2)
            : 0,
            'answers' => $this->answers,
            'time_spent' => $this->time_spent,
            'completed_at' => $this->completed_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // Include relationships if loaded
            'user' => new UserResource($this->whenLoaded('user')),
            'quiz' => new QuizResource($this->whenLoaded('quiz')),
        ];
    }
}
