<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ReplyResource;

class ReplyController extends Controller{

    public function index(Question $question){
        return ReplyResource::collection($question->replies()->paginate(10));
    }

    public function store(Request $request, Question $question){
        $reply = $question->replies()->create($request->all());
        return new ReplyResource($reply);
    }

    public function show(Question $question, Reply $reply){
        return new ReplyResource($reply);
    }

    public function update(Request $request, Question $question, Reply $reply){
        $reply->update($request->all());
        return new ReplyResource($reply);
    }

    public function destroy(Question $question, Reply $reply){
        $reply->delete();
        return response('Reply deleted', Response::HTTP_NO_CONTENT);
    }
}
