<div class="border border-gray-300 rounded-lg">
    @forelse($tweets as $tweet)
        @include('tweets._tweet')
    @empty
    	<p class="p-4">{{ __('no_tweets') }}</p>
    @endforelse

    {{ $tweets->links() }}
</div>