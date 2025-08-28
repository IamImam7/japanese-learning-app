<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProgressResource extends JsonResource
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
            'progressable_type' => $this->progressable_type,
            'progressable_id' => $this->progressable_id,
            'mastery_level' => $this->mastery_level,
            'last_reviewed' => $this->last_reviewed,
            'next_review' => $this->next_review,
            'review_count' => $this->review_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // Include relationships if loaded
            'progressable' => $this->whenLoaded('progressable', function () {
                // Return different resource types based on progressable_type
                switch ($this->progressable_type) {
                    case 'App\Models\JapaneseCharacter':
                        return new JapaneseCharacterResource($this->progressable);
                    case 'App\Models\Vocabulary':
                        return new VocabularyResource($this->progressable);
                    case 'App\Models\GrammarRule':
                        return new GrammarRuleResource($this->progressable);
                    default:
                        return $this->progressable;
                }
            }),

            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
