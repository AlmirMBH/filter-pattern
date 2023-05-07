<?php

namespace App\Models;

use App\Traits\Filters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory, Filters;

    // use Filter trait instead of the method!!!
    public function scopeFilter($query, $threadFilters)
    {   
        return $threadFilters->apply($query); // Eloquent builder based on Thread:class
    }
}
