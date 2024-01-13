<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea name="body" class="w-full p-4" placeholder="What's up doc?" required></textarea>
        <hr class="my-4">
        <footer class="flex justify-between itmes-center">
            <img src="{{asset(auth()->user()->avatar)}}" style="width: 50px" class="rounded-full mr-4">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 rounded-full shadow py-2 px-10 text-white">Publish</button>
        </footer>
    </form>
    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>
