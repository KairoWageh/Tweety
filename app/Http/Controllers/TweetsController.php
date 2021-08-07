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

    /**
     * stores the new tweet
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        return $this->tweetsRepository->store($request);
    }

    /**
     * destroys a specific tweet
     * @param $tweet_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($tweet_id){
        return $this->tweetsRepository->destroy($tweet_id);
    }
}
