<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\contracts\TweetsRepositoryInterface;


class TweetsController extends Controller
{
    protected $tweetsRepository;

    public function __construct(TweetsRepositoryInterface $tweetsRepository){
        $this->tweetsRepository = $tweetsRepository;
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store(Request $request){
        return $this->tweetsRepository->store($request);

//    	$attributes = request()->validate(['body' => 'required|max:255']);
//    	Tweet::create([
//    		'user_id' => auth()->id(),
//    		'body' => $attributes['body'],
//    	]);
//
//    	return redirect()->back();
    }
}
