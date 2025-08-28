<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = [
        'word',
        'reading',
        'meaning',
        'example_sentence',
        'category',
        'jlpt_level',
        'related_kanji',
    ];
    protected $casts = [
        'related_kanji' => 'array',
    ];
}

