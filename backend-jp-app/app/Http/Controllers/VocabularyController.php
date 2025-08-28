<?php

namespace App\Http\Controllers;

use App\Http\Resources\VocabularyResource;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function index(Request $request){
            $query = Vocabulary::query();

            if($request->has('level')){
                $query->where('jlpt_level', $request->level);
            }
            if($request->has('category')){
                $query->where('category', $request->category);
            }

            $vocabularies = $query->get();

            return VocabularyResource::collection($vocabularies);
    }

    public function show($id){
        $vocabulary = Vocabulary::findOrFail($id);

        if(!$vocabulary){
            return response()->json(['message' => 'Vocabulary not found'],404);
        }
        return new VocabularyResource($vocabulary);
    }

    public function getByLevel($level){
        $vocabularies = Vocabulary::where('jlpt_level', $level)->get();

       return VocabularyResource::collection($vocabularies);
    }
}
