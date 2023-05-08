<?php

namespace App\Http\Controllers;

use App\Filters\UserFilters;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{    
    protected function getUsers(UserRequest $request): Object // validation
    {   
        $request->session()->put('userFilterInput', $request->input());
        $users = (new User)->filter(new UserFilters());
        return view('userfilters', compact('users'));
    }

}
