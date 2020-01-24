<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| Part of test 4, 5
*/

Route::get('/question_answers/{id?}','QuestionController@get_all_question_answers');

Route::put('/update_question/{question}','QuestionController@update');
