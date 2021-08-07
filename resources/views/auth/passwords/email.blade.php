<x-master>
<div class="container mx-auto flex justify-center">
    <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
        <div class="col-md-8">
            <div class="font-bold text-lg mb-4">{{ __('Reset Password') }}</div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-bold text-xs text-gray-700">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
