<?php

namespace App\Http\Controllers;

use App\Mail\NewStoryNotification;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            // DB::enableQueryLog();
            $query = Story::where('status' , 1);
            $type = request()->input('type');

            if(in_array($type , ['long' , 'short'])){
                $query->where('type' , $type);
            }

            $stories = $query->with('user')->orderBy('id' , 'DESC')->simplePaginate(6);
            return view('dashboard.index' , ['stories' => $stories]);
        }

         /**
         * Display the specified resource.
         *
         * @param \App\Models\Story $story
         * @return \Illuminate\Http\Response
         */
         public function show(Story $activeStory)
         {
             return view('dashboard.show' , ['story' => $activeStory]);
         }

        //   public function email()
        //   {
        //     //   Mail::raw('this is demy row' , function($message){
        //     //         $message->to('admin@localhost.com')->subject('new story added');
        //     //   });

        //         // Mail::to('admin@lochost.com')->send(new NotifyAdmin('this is title'));

        //         Mail::send(new NewStoryNotification('title'));
        //   }
}
