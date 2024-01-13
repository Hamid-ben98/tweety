<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class ProfileController extends Controller
{
    public function show(User $user){
     return view('profiles.show',[
         'user'=>$user,
         'tweets'=>$user->tweets()->withLikes()->paginate(3)
     ]);
    }

    public function followMe(User $user){
      if(auth()->user()->isFollowing($user)){
          auth()->user()->unFollow($user);
      }
      else{
        auth()->user()->follow($user);
        }

        return view('profiles.show',['user'=>$user]);
    }

    public function edit(User $user){
        //$this->authorize('edit',$user);
        return view('profile.edit',['user'=>$user]);
    }

    public function update(User $user){
//dd(request('avatar'));
       $attributs= request()->validate(
            [
                'username' => [
                    'required'
                    ,'string'
                    ,'max:255'
                    , Rule::unique('users')->ignore($user)
                    ,'alpha_dash'],
                'name' => ['required'
                    ,'string'
                    , 'max:255'],
                'avatar' => ['file'],
                'email' => ['required'
                    , 'string'
                    , 'email'
                    , 'max:255'
                    , Rule::unique('users')->ignore($user)],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
       if(request('avatar')){$attributs['avatar']=request('avatar')->store('avatars');}
       $attributs['password']=bcrypt($attributs['password']);
       $user->update($attributs);

        return view('profiles.show',['user'=>$user]);
    }
}
