<?php
namespace App\Helpers;

class HelperFunctions{

    public static function getLoggedUser(): Object
    {
        return auth()->user();
    }
    
    public static function getLoggedUserRoleId(): int
    {
        return auth()->user()->role_id;
    }

}
