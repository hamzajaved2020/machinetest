<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Option;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index(){

        return view("question");
    }

    public function getData(Request $request){

        if(session("final_result",false)){
            return  array( "type"=>"result","data"=>Result::where('user_id',auth()->user()->id)->first());
        }
        return  array( "type"=>"question","data"=>Question::where('id',$request->question_no )->first());
    }
}
