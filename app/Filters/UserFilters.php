<?php

namespace App\Filters;

use \App\Traits\Filters as FiltersTrait;
use Illuminate\Database\Eloquent\Builder;

class UserFilters extends Filters
{    
    use FiltersTrait;


    public function name(string $userName): Builder
    {
        return $this->builder->where('name', $userName);
    }


    public function email(string $email): Builder
    {
        return $this->builder->where('email', $email);
    }


    public function roleId(int $roleId): Builder
    {
        return $this->builder->where('role_id', $roleId);
    }


    // Move this method into Filters trait and use it in all filters!!!
    protected function orderById(string $order): Builder
    {
        return $this->builder->orderBy('id', $order);
    }

}
