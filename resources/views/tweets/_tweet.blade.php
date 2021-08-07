<div class="flex p-4 {{$loop->last? '': 'border-b border-b-gray-400'}} ">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{$tweet->user->avatar}}"alt="" class="rounded-full mr-2" width="50" height="50">
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ route('profile', $tweet->user) }}">     {{$tweet->user->name}}
            </a>
        </h5>
        @if($tweet->user->name == current_user()->name)
            <form method="POST" action="{{route('delete_tweet', $tweet->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-gray-500">{{ __('delete')}}</button>
            </form>
        @endif
        <p class="text-sm mb-3">
            {{$tweet->body}}
        </p>
        <x-like-buttons :tweet="$tweet"></x-like-buttons>
    </div>
</div>
