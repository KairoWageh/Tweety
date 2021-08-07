<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet){
        $check_like = Like::where('tweet_id', $tweet->id)->where('liked', 1)->get();
        if($check_like->isEmpty()){
            $tweet->like(current_user());
        }else{
            Like::where('tweet_id', $tweet->id)->delete();
        }
    	return back();
    }

    public function destroy(Tweet $tweet){

        $check_dis_like = Like::where('tweet_id', $tweet->id)->where('liked', 0)->get();
        if($check_dis_like->isEmpty()){
            $tweet->disLike(current_user());
        }else{
            Like::where('tweet_id', $tweet->id)->delete();
        }
        return back();
    }
}
