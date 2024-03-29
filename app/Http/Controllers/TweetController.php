<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
class TweetController extends Controller
{
    public function index ()
    {
        return view('home',[
            'tweets'=>auth()->user()->timeline()
        ]);
    }
    public function store ()
    {
        request()->validate([
        'body'=>'required|max:255'
         ]);
        Tweet::create([
            'user_id'=>auth()->user()->id,
            'body' => request('body')
        ]);
        return redirect('/tweets');
    }
}
