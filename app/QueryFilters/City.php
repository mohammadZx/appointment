<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class City extends Filter{
    
    public function filterName(){
        return 'city';
    }

    public function applyFilter($builder){
        return $builder->where($this->table . '.city_id' , request()->get($this->filterName()));
    }
}