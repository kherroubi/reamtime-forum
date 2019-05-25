<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use Symfony\Component\HttpFoundation\Response;
class QuestionController extends Controller
{
    public function index(){
        return QuestionResource::collection(Question::paginate(10));    
    }

    public function store(Request $request){
        $question = Question::create($request->all());
        return new QuestionResource($question);
    }

    public function show(Question $question){
        return new QuestionResource($question);
    }

    public function update(Request $request, Question $question){
        $question->update($request->all());
        return new QuestionResource($question);
    }

    public function destroy(Question $question){
        $question->delete();
        return response('Question deleted', Response::HTTP_NO_CONTENT);
    }
}
