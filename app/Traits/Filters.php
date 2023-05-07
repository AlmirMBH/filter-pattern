<?php
namespace App\Traits;

trait Filters {

    public function scopeFilter($query, $filters)
    {   
        return $filters->apply($query);
    }


    public function orderById($order){        
        return $this->builder->orderBy('id', $order);
    }
    
}
