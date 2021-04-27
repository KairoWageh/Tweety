<?php

namespace App\Repository\sql;

use App\Repository\contracts\TweetsRepositoryInterface;
use App\Http\Requests\TweetsRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Tweet;

class TweetsRepository extends BaseRepository implements TweetsRepositoryInterface
{
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

    	//return redirect()->back();
    }
}
