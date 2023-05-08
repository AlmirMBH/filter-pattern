<?php

namespace App\Http\Controllers;

use App\Filters\ThreadFilters;
use App\Helpers\HelperFunctions;
use App\Http\Requests\ThreadFilterRequest;
use App\Models\Thread;
use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

class ThreadController extends Controller
{

    // 1) How to add a new filter?    
    // 2) How to restrict each of the filters to be used input by specific user(s)/role(s)?
    // 3) How to restrict filters to accept input specific values?
    // 4) What kind of programming is this? Should we validate the users' input? Is there a way to make a filter re-usable?
    


    // protected function getThreads()
    // {    
    //     request()->session()->put('threadFilterInput', request()->input());
    //     $user = User::where('name', request()->input('byName'))->first();
    //     $threads = Thread::query();

    //     if ($user) {
    //         $threads = Thread::where(['user_id' => $user->id]);
    //     }

    //     if (request()->filled('repliesCount')) {            
    //         $threads->where('replies_count', request()->input('repliesCount'));
    //     }

    //     $threads = $threads->orderBy('id', request()->input('orderById') ?? 'asc')
    //                        ->paginate(request()->input('pagination'));
        
    //     return view('threadfilters', compact('threads'));
    // }

    //QUESTION 1================================================================================================================================
    // protected function getThreads()
    // {   
    //     request()->session()->put('threadFilterInput', request()->input());        
    //     $user = User::where('name', request()->input('byName'))->first();        
    //     $threads = Thread::query();

    //     if ($user) {
    //         $threads = Thread::where(['user_id' => $user->id]);
    //     }
        
    //     if (request()->filled('repliesCount')) {            
    //         $threads->where('replies_count', request()->input('repliesCount'));
    //     }

    //     if (request()->filled('threadChannelId')) {            
    //         $threads->where('channel_id', request()->input('threadChannelId'));
    //     }

    //     $threads = $threads->orderBy('id', request()->input('orderById') ?? 'asc')
    //                        ->paginate(request()->input('pagination'));

    //     return view('threadfilters', compact('threads'));
    // }


//     // QUESTIONS 2 & 3===============================================================================================================================
        // protected function getThreads()
        // {   
        //     request()->session()->put('threadFilterInput', request()->input());        
        //     $user = User::where('name', request()->input('byName'))->first();
        //     $threadChannelId = request()->input('threadChannelId');
        //     $threads = Thread::query();

        //     if ($user) {
        //         if (auth()->user()->role_id == 1){ // Is this line of code ok?
        //             $threads = Thread::where(['user_id' => $user->id]);
        //         }                
        //     }
            
        //     if (request()->filled('repliesCount')) {            
        //         $threads->where('replies_count', request()->input('repliesCount'));
        //     }

        //     if (request()->filled('threadChannelId')) {
        //         if((auth()->user()->role_id == 1) && ($threadChannelId != 0)){ // Is this line of code ok?
        //             $threads->where('channel_id', $threadChannelId);
        //         }                
        //     }

        //     $threads = $threads->orderBy('id', request()->input('orderById') ?? 'asc')
        //                        ->paginate(request()->input('pagination'));

        //     return view('threadfilters', compact('threads'));
        // }


    // QUESTION 4=============================================================================================================================
    protected function getThreads(ThreadFilterRequest $request): Object // validation
    {           
        $request->session()->put('threadFilterInput', $request->input());        
        $threads = (new Thread)->filter(new ThreadFilters());
        return view('threadfilters', compact('threads'));        
    }

}
