<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Questions;
use App\Models\Question;
use Illuminate\Support\Facades\Cache;

class QuestionController extends Controller
{

    /**
     *  Getting all question answer for api.
     *  Tried redis for caching and fast response.
     *  When first time the api is called data is fetched from database
     *  and then saved into redis -> response time is avg 523 ms
     *  When second/later time api is called data is served from redis server -> response time is avg 350 ms
     *  used predis package for redis
     *
     */
    function get_all_question_answers(Question $question=null){
        $all_question_answers = Cache::store('redis')->get('all_question_answers',function(){
            $data = Question::paginate(2000);
            Cache::store('redis')->set('all_question_answers',$data);
            return $data;
        });
        return Questions::collection($all_question_answers);
    }

    /**
     *  Updating question and answers from api with put method.
     *
     */
    function update(Request $request,Question $question){

        $data = $request->validate([
            'type'=>'string',
            'name'=>'string',
            'question_required' =>'',
            'description' =>'String',
            'answer' =>'String',
        ]);

        try{
            $question->update($data);
            return response(['status'=>'200']);
        }catch (\Exception $e){
            return response(['status'=>'500']);
        }
    }
}
