<?php

namespace App\Models;

use App\Filters\Filters as BaseFilter;
use App\Traits\Filters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Thread extends Model
{
    use HasFactory, Filters;

    // use Filter trait instead of the method!!!
    public function scopeFilter(Builder $query, BaseFilter $threadFilters): Object
    {   
        return $threadFilters->apply($query); // Eloquent builder based on Thread:class
    }
}
