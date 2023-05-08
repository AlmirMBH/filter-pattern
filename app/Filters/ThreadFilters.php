<?php
namespace App\Filters;

use App\Helpers\HelperFunctions;
use App\Helpers\Channel;
use App\Helpers\Role;
use \App\Models\User;
use \App\Traits\Filters as FiltersTrait;
use Illuminate\Database\Eloquent\Builder;

class ThreadFilters extends Filters
{    
    use FiltersTrait;

    public function byName(string $userName): Builder
    {        
        $user = User::where('name', $userName)->first(); // builder = Thread::class                
        return $this->builder->where('user_id', $user->id);
    }


    public function repliesCount(int $status): Builder
    {
        return $this->builder->where('replies_count',  $status);        
    }


    protected function orderById(string $order): Builder
    {
        return $this->builder->orderBy('id', $order); // e.g. 'desc'
    }


    // How to add a new filter?    
    // How to restrict each of the filters to be used only by specific user(s)/role(s)?
    // How to restrict filters to accept only specific values?
    // BONUS: How to extract the restrictions into a separate class (gates and policies)?








    public function threadChannelId(int $channelId): Builder
    {
        return $this->builder->where('channel_id', $channelId);
    }


    // public function threadChannel(int $channelId): Builder
    // {
    //     if(auth()->user()->role_id == 1){                                // Is this line a good practice?
    //         return $this->builder->where('channel_id', $channelId);
    //     }
    //     return $this->builder;
    // }


    // public function threadChannel(int $channelId): Builder
    // {
    //     if(auth()->user()->role_id == Role::SUPER_ADMIN){                                // Is this line a good practice?
    //         return $this->builder->where('channel_id', $channelId);
    //     }
    //     return $this->builder;
    // }


    // public function threadChannel(int $channelId): Builder
    // {
    //     if(HelperFunctions::getLoggedUserRoleId() == Role::SUPER_ADMIN){
    //         return $this->builder->where('channel_id', $channelId);
    //     }
    //     return $this->builder;
    // }


    // public function threadChannel(int $channelId): Builder
    // {
    //     if(request()->filled('replies_count')){
    //         if((HelperFunctions::getLoggedUserRoleId() == Role::SUPER_ADMIN) && ($channelId == Channel::VIBER)){
    //             return $this->builder->where('channel_id', $channelId);
    //         }
    //         return $this->builder;
    //     }        
    // }
    
}
