<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class AptStatus extends Filter{
    
    public function filterName(){
        return 'aptstatus';
    }

    public function applyFilter($builder){
        return $builder->where($this->table . '.status' , request()->get($this->filterName()));
    }
}