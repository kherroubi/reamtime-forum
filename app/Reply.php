<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\User;
use App\Like;
class Reply extends Model
{
	protected $guarded = [];
	
    public function Question(){
    	return $this->belongsTo(Question::class);
    }

    public function User(){
    	return $this->belongsTo(User::class);
    }

    public function likes(){
    	return $this->hasMany(Like::class);
    }
}
