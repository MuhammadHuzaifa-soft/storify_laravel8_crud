<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index(){
        $stories = Story::where('user_id' , auth()->user()->id)->orderBy('id' , 'DESC')->simplePaginate(2);
        return view('stories.index' , ['stories' => $stories]);
    }

     public function show(Story $story){
        // dd($story);
          return view('stories.show' , ['story' => $story]);
     }
}