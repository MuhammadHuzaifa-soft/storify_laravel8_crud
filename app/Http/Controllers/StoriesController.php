<?php

namespace App\Http\Controllers;

use App\Events\StoryCreated;
use App\Models\Story;
use Illuminate\Http\Request;
use App\Mail\NewStoryNotification;
use App\Http\Requests\StoryRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Story::class , 'story');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $stories = Story::where('user_id' , auth()->user()->id)->orderBy('id' , 'DESC')->simplePaginate(6);
         return view('stories.index' , ['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  $this->authorize('create');

        $story = new Story;
        return view('stories.create' , ['story' => $story]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {

        // dd($request->all());
       $story = auth()->user()->stories()->create($request->all());
    //    Mail::send(new NewStoryNotification($story->title));
    //    Log::info($story->title);
        event(new StoryCreated('$story->title'));
       return redirect()->route('stories.index')->with('status' , 'Story created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
            return view('stories.show' , ['story' => $story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        // Gate::authorize('edit_stories' , $story);
        // $this->authorize('update' ,$story);
        return view('stories.edit' , ['story' => $story]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
    //    $data = $request->validate([
    //     'title' => 'required',
    //     'body' => 'required',
    //     'type' => 'required',
    //     'status' => 'required'
    //     ]);

        // dd($request->all());
        auth()->user()->stories()->create($request->all());
        return redirect()->route('stories.index')->with('status' , 'Story updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
            $story->delete();
            return redirect()->route('stories.index')->with('status' , 'Story deleted successfully');
    }
}