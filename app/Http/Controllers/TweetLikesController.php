<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet){
    	$tweet->like(current_user());
    	return back();
    }

    public function destroy(Tweet $tweet){
    	$tweet->disLike(current_user());
    	return back();
    }
}
