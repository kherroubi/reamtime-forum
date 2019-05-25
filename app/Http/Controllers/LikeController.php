<?php

namespace App\Http\Controllers;

use App\Like;
use App\Question;
use App\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\LikeResource;

class LikeController extends Controller
{

    public function index(Request $request, Question $question, Reply $reply ){
        //User's likes
        return LikeResource::collection($reply->likes);
    }


    public function store(Request $request,Question $question, Reply $reply){
        $reply->likes()->create(['user_id'=>1]);
        return response('liked', Response::HTTP_CREATED);
    }

    public function destroy(Question $question, Reply $reply, Like $like){
        $like->delete();
        return response('Like deleted', Response::HTTP_NO_CONTENT);
    }
}
