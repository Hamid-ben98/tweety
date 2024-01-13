
<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
	@forelse(auth()->user()->follows as $user)
	<li class="{{$loop->last ? '' : 'mb-4'}}">
		<div class="flex items-center text -sm">
            <a href="/profiles/{{$user->username}}"><img src="https://i.pravatar.cc/40?u={{$user->email}}" class="rounded-full mr-4"></a>
            <a href="/profiles/{{$user->username}}">{{$user->name}}</a>
		</div>
	</li>
    @empty
        <li>No friends yet.</li>
	@endforelse
</ul>

