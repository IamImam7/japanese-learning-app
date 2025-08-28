<?php

namespace App\Http\Controllers;

use App\Http\Resources\JapaneseCharacterResource;
use App\Models\JapaneseCharacter;
use Illuminate\Http\Request;

class JapaneseCharacterController extends Controller
{
    public function index(Request $request)
    {
        $query = JapaneseCharacter::query();

        if($request->has('type')){
            $query->where('type', $request->type);
        }
        if($request->has('jlpt_level')){
            $query->where('jlpt_level', $request->level);
        }
        $characters = $query->get();

       return JapaneseCharacterResource::collection($characters);
    }

    public function show($id){
        $character = JapaneseCharacter::find($id);
        if(!$character){
            return response()->json(['message' => 'Character not found'],404);
        }
        return new JapaneseCharacterResource($character);
    }

    public function getByType($type){
        $characters = JapaneseCharacter::where('type', $type)->get();
        return JapaneseCharacterResource::collection($characters);
    }
}
