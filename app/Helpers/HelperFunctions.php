<?php
namespace App\Helpers;

class HelperFunctions{

    public static function getLoggedUser(){
        return auth()->user();
    }
    
    public static function getLoggedUserRoleId(){
        return auth()->user()->role_id;
    }

}
