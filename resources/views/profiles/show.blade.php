<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{ asset('public/images/index.jpg') }}" width="100%" class="mb-2">
            <img src="{{$user->avatar}}"alt="" class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%" width="150">
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">{{__('edit_profile')}}</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <p class="text-sm">
            {{ $user->description  }}
        </p>


    </header>
    <hr>

    @include('tweets._timeline',
        ['tweets' => $tweets]
    )
</x-app>
