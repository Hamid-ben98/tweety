@forelse($tweets as $tweet)
    @include('tweet')
@empty
    <p class="p-4">No Tweet yet.</p>
@endforelse

{{$tweets->links()}}
