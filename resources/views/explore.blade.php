<x-app>
    Explore Page
    @foreach($users as $user)
        <a class="flex m-5 items-center" href="/profiles/{{$user->username}}">


                <img width="50px" class="mr-5 rounded" src="{{asset($user->avatar ?: '/avatars/default_image.png')}}">
                <label class="font-bold text-uppercase align-content-center">{{'@'.$user->username}}</label>


        </a>
    @endforeach

</x-app>
