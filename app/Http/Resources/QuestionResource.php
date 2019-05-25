<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray($request){
        return [
            'url'       =>  $this->url,
            'title'     =>  $this->title,
            'slug'		=>	$this->slug,
            'content'   =>  $this->content,
            'user'      =>  $this->user->name,
            'created_at'=>  $this->created_at->diffForHumans()
        ];
    }
}
