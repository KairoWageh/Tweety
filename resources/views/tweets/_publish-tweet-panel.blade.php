<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="post" action="tweets" class="add_tweet">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up?" required autofocus=""
        >
        </textarea>
        <hr class="my-4">
    </form>
        <footer class="flex justify-between items-center">
            <img src="{{current_user()->avatar}}" alt="" class="rounded-full mr-2" width="50" height="50">
            <button type="button" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-2 text-white publish_tweet">
                {{__('publish')}}</button>
        </footer>


    @error('body')
        <p class="text-red-500 text-sm mr-2">{{ $message }}</p>
    @enderror
</div>

@push('scripts')
    <script type="text/javascript">
        $('.publish_tweet').click(function(){
            var url = "{{url('/tweets')}}";
            $.ajax({
                url: url,
                type: "POST",
                data: $('.add_tweet').serialize(),
                {{--data: {"_token": "{{ csrf_token() }}"},--}}
                success:function(response){
                    if(response.toast == 'success'){
                        toastr.success(response.message);
                    }else{
                        toastr.error(response.message);
                    }
                },error: function (xhr) {
                    //$('.validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        console.log('error::::'+value);
                    });
                },
            });
        });
    </script>
@endpush
