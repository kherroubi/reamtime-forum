<?php

use Illuminate\Http\Request;

Route::apiResource('/question', 'QuestionController');
Route::apiResource('/category', 'CategoryController');
Route::apiResource('/question/{question}/reply', 'ReplyController');
Route::apiResource('/question/{question}/reply/{reply}/like', 'LikeController')->only(['index', 'store', 'destroy']);