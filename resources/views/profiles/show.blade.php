<x-app>

    <header class="mb-6">
       <div class="relative">
           <img class="rounded-full mb-8" src="/images/default_image.png">
           <img
            src="{{asset($user->avatar)}}"
            class="rounded-full"
            style="width: 150px;position:absolute;top: 80%;left: calc(50% - 80px);">
       </div>
        <div class="flex justify-between">
            <div>
                <h2 class="font-bold text-uppercase" style="max-width: 278px;">{{$user->name}}</h2>
                <p class="text-sm">joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex justify-between">
                <div>
                    @can('edit',$user)

                     <a href="/profiles/{{$user->username}}/edit"
                             class="rounded-full border border-grey-300 py-2 px-4 text-black-50 text-xs mr-5">
                             Edit Profile
                     </a>

                    @endcan
                </div>
                <div>
                    <x-button_follow :user="$user"></x-button_follow>
               </div>
            </div>
        </div>
        <p class="text-sm mt-2">Word is a powerful application, but some of the configuration tools are not very intuitive. It’s easy enough to change the font for text in your current document, but that doesn’t change the default font that’s applied every time you create a new document.</p>



    </header>

    <hr class="my-10">

    @include('timeline',['tweets'=>$tweets,])
    </x-app>
