<?php

namespace App\Http\Controllers\Admin;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoriesController extends Controller
{
       /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
       public function index()
       {
        //    dd('here');
            $stories = Story::onlyTrashed()->with('user')->simplePaginate(10);
            return view('admin.stories.index' , ['stories' => $stories]);
       }

       public function restore($id){
           $story = Story::withTrashed()->findOrFail($id);
            $story->restore();
            return redirect()->route('admin.stories.index')->with('status' , 'Story restore successfully');
       }
       public function delete($id){
            $story = Story::withTrashed()->findOrFail($id);
            $story->forceDelete();
             return redirect()->route('admin.stories.index')->with('status' , 'Story deleted successfully');
       }
}
