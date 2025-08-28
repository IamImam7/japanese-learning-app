<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VocabularyResource extends JsonResource
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
       'word' => $this->word,
       'reading' => $this->reading,
       'meaning' => $this->meaning,
       'example_sentence' => $this->example_sentence,
       'category' => $this->category,
       'jlpt_level' => $this->jlpt_level,
       'related_kanji' => $this->related_kanji,
       'created_at' => $this->created_at,
       'updated_at' => $this->updated_at,
        ];
}
}
