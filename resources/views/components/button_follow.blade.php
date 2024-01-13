@unless(auth()->user()->is($user))
    <form method="POST" action="/profiles/{{$user->username}}">
        @csrf
        <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
            {{auth()->user()->isFollowing($user) ? 'UnFollow me' : 'Follow me'}}
        </button>
    </form>
@endunless
