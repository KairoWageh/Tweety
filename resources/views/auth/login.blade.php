<x-master>
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-bold text-xs text-gray-700">{{ __('email') }}</label>

                            <input id="email" type="email" class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 font-bold text-xs text-gray-700">{{ __('password') }}</label>

                        <input id="password" type="password" class="border border-gray-400 p-2 w-full @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="font-bold text-xs text-gray-700" for="remember">
                                {{ __('remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">
                            {{ __('login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-xs text-gray-700" href="{{ route('password.request') }}">
                                {{ __('forgot_your_password') }}?
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
