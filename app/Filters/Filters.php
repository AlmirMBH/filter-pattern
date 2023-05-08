<?php
namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filters
{
    protected $builder;
    

    public function apply(Builder $queryBuilder): Object
    {
        $this->builder = $queryBuilder;

        foreach ($this->getFilters() as $filter => $value) {    // Is this a good coding practice?            
            if (method_exists($this, $filter)){
                if ($value === NULL){                    
                    continue;
                }
                    $this->$filter($value);                                 
            }
        }

        return $this->builder->paginate(request()->input('pagination'));
    }

    protected function getFilters(): array
    {
        return request()->input();
    }

}