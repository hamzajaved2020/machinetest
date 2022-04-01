<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Option;
use App\Models\Result;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //

    public function index(Request $request){
        // put question # in session to use it for restart browser
        session()->put('question_no',$request->question_id);

        Answers::create(
            array(
                "is_skip"=>$request->is_skip,
                "is_correct"=>$request->is_skip ? 0 : Option::find($request->option_id)->is_correct  ,
                "option_id"=>$request->option_id,
                "user_id"=>auth()->user()->id,
            )
        );

        if($request->question_id >= 10){
            Result::create(
                array(
                    "skip"=>Answers::where('user_id',auth()->user()->id)->where('is_skip',1)->count(),
                    "correct"=>Answers::where('user_id',auth()->user()->id)->where('is_correct',1)->count(),
                    "wrong"=>Answers::where('user_id',auth()->user()->id)->where('is_correct',0)->where('is_skip',0)->count(),
                    "user_id"=>auth()->user()->id,
                )
            );
            session()->put('final_result',true);
        }
    }
}
