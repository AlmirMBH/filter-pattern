<?php
namespace App\Filters;

abstract class Filters
{
    protected $builder;
    protected $filters = [];

    public function apply($threadBuilder)
    {
        $this->builder = $threadBuilder;

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

    protected function getFilters()
    {
        return request()->input();
    }

}