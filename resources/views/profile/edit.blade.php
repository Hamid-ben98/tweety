<x-app>
<form method="POST" action="/profiles/{{$user->username}}/edit" enctype="multipart/form-data">
@csrf
    @method('PATCH')
<div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>


            <input id="name"
                   type="text"
                   class="border w-full border-grey-400 p-2 @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ $user->name }}" required autocomplete="name"
                   autofocus>

            @error('username')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

</div>
    <div class="mb-6">
        <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('UserName') }}</label>

        <div class="">
            <input id="username" type="text"
                   class="border w-full border-grey-400 p-2 @error('username') is-invalid @enderror"
                   name="username" value="{{ $user->username}}" required autocomplete="username" autofocus>

            @error('username')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email"
                   class="border w-full border-grey-400 p-2 @error('email') is-invalid @enderror"
                   name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="mb-6">
        <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">Avatar</label>

        <div class="col-md-6">
            <input id="avatar" type="file" class="w-full p-2" name="avatar">
        </div>
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password"
                   class="border w-full border-grey-400 p-2 @error('password') is-invalid @enderror"
                   name="password"
                    required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="mb-6">
        <label for="password-confirm" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="border w-full border-grey-400 p-2" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <button type="submit" class="bg-blue-500 rounded-lg shadow py-4 px-4 text-white">Edit</button>
    <a href="/profiles/{{$user->username}}" class="text-sm py-4">Cancel</a>
</form>

</x-app>
