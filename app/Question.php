<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Reply;
use App\Category;

class Question extends Model
{
    protected $guarded = [];

	public function getRouteKeyName(){
		return 'slug';
	}

    public function User(){
    	return $this->belongsTo(User::class);
    }
    
    public function Replies(){
    	return $this->hasMany(Reply::class);
    }

    public function Category(){
    	return $this->belongsTo(Category::class);
    }

    public function getUrlAttribute(){
   		return url("api/question/$this->slug");
    }
}
