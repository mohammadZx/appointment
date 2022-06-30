<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class Service extends Filter{
    
    public function filterName(){
        return 'service';
    }

    public function applyFilter($builder){
        return $builder->where($this->table . '.service_id' , request()->get($this->filterName()));
    }
}