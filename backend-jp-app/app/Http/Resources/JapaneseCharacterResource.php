<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JapaneseCharacterResource extends JsonResource
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
            'character' => $this->character,
            'type' => $this->type,
            'romaji' => $this->romaji,
            'meaning' => $this->meaning,
            'stroke_order' => $this->stroke_order,
            'examples' => $this->examples,
            'jlpt_level' => $this->jlpt_level,
            'stroke_count' => $this->stroke_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
