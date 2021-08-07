<?php

namespace App\Repository\sql;

use App\Repository\contracts\TweetsRepositoryInterface;
use App\Http\Requests\TweetsRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Tweet;

class TweetsRepository extends BaseRepository implements TweetsRepositoryInterface
{
    /**
     * stores a new tweet
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($request){
        $tweeetsRequest = new TweetsRequest();
        $input = $request->all();
        $validator = Validator::make($input, $tweeetsRequest->rules());
        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => 'Validation Error.',
            ];
            $errorMessages = $validator->errors();
            if (!empty($errorMessages)) {
                $response['data'] = $errorMessages;
            }
            $code = 404;
            $data = [
                'toast' => 'error',
                'message' => $errorMessages
            ];
            return response()->json($data);

        }
        $input['user_id'] = auth()->id();
    	$tweet = Tweet::create($input);

        if($tweet == true){
            $data = [
                'tweet' => $tweet,
                'toast'  => 'success',
                'message'  => __('created')
            ] ;
        }else{
            $data = [
                'toast'  => 'error',
                'message'  => __('not_created')
            ] ;
        }
        return response()->json($data);
    }

    /**
     * deletes a specific tweet
     * @param $tweet_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($tweet_id){
        $tweet_to_delete = Tweet::find($tweet_id);
        $tweet_to_delete->delete();
        return back();
    }
}
