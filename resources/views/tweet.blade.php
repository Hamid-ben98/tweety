<div class="flex-shrink-0 border border-gray-300 rounded-lg mb-8">
    <div class="flex p-4">
        <div class="mr-2 flex-shrink-0">
            <a href="/profiles/{{$tweet->user->username}}">
                <img src="{{asset($tweet->user->avatar)}}" style="width: 50px" class="rounded-full mr-4">
            </a>
        </div>
        <div class="">
            <h5 class="font-bold mb-4">
                <a href="/profiles/{{$tweet->user->username}}">
                    {{$tweet->user->name}}
                </a>
            </h5>
            <p class="text-sm">
                {{$tweet->body}}
            </p>
        </div>
    </div>
    <div class="flex mx-10 pb-4">
    <div class="flex justify-between mx-10">
        <svg viewBox="0 0 20 20" class="flex {{$tweet->isLikedBy(auth()->user()) ? 'text-blue' : 'text-grey'}} w-3">
            <g id="Page-1" stroke="none" class="text-grey-700" stroke-width="1" fill="none" fill-rule="evenodd">
                <g class="fill-current">
                    <path style="width: 10px" d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                </g>
            </g>
        </svg>
        <p class="flex text-sm">{{$tweet->likes ? $tweet->likes : '0'}}</p>
    </div>
    <div class="flex justify-between">
        <span >
						<svg viewBox="0 0 20 20" class="flex {{$tweet->isDislikedBy(auth()->user()) ? 'text-reed' : 'text-grey'}} w-3">
						<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<g class="fill-current">
								<path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z" id="Fill-97"></path>
							</g>

						</g>
						</svg>
        <p class="flex text-sm">{{$tweet->dislikes ? $tweet->dislikes : '0'}}</p>
        </span>
    </div>
    </div>
</div>
