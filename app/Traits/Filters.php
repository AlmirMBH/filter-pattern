<?php
namespace App\Traits;

use App\Filters\Filters as BaseFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filters {

    public function scopeFilter(Builder $query, BaseFilter $filters): Object
    {   
        return $filters->apply($query);
    }


    public function orderById(string $order): Builder
    {
        return $this->builder->orderBy('id', $order);
    }
    
}
