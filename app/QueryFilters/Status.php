<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class Status extends Filter{
    
    public function filterName(){
        return 'status';
    }

    public function applyFilter($builder){
        return $builder->where($this->table . '.status' , request()->get($this->filterName()));
    }
}