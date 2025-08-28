<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JapaneseCharacter extends Model
{
    use HasFactory;

    protected $fillable = [
        'character',
        'type',
        'romaji',
        'meaning',
        'stroke_order',
        'examples',
        'jlpt_level',
        'stroke_count',
    ];

    protected $casts = [
        'examples' => 'array',
    ];
}
