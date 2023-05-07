<?php

namespace App\Filters;

use \App\Traits\Filters as FiltersTrait;

class UserFilters extends Filters
{    
    use FiltersTrait;


    public function name($userName){        
        return $this->builder->where('name', $userName ?? "");
    }


    public function email($email){
        return $this->builder->where('email', $email);
    }


    public function roleId($roleId){
        return $this->builder->where('role_id', $roleId);
    }


    // Move this method into Filters trait and use it in all filters!!!
    protected function orderById($order){
        return $this->builder->orderBy('id', $order);
    }

}
