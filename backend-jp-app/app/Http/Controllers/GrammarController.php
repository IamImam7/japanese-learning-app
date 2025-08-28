<?php

namespace App\Http\Controllers;

use App\Http\Resources\GrammarRuleResource;
use App\Models\GrammarRule;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Http\Request;

class GrammarController extends Controller
{
    public function index(Request $request){
        $query = GrammarRule::query();

        if($request->has('level')){
            $query->where('level', $request->level);
        }

        $grammarRules = $query->get();

        return GrammarRuleResource::collection($grammarRules);
    }

    public function show($id){
        $grammarRule = GrammarRule::findOrFail($id);
        return new GrammarRuleResource($grammarRule);
    }

    public function getByLevel($level){
        $grammarRules = GrammarRule::where('level', $level)->get();

        return GrammarRuleResource::collection($grammarRules);
    }

}
