<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'progress_level' => $this->progress_level,
            'last_studied_at' => $this->last_studied_at,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'progress' => new UserProgressResource($this->whenLoaded('progress')),
            'quiz_attempts' => QuizAttemptResource::collection($this->whenLoaded('quiz-attempts')),
        ];
    }
}
