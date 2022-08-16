<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class Search extends Filter{
    
    public function filterName(){
        return 'name';
    }

    public function applyFilter($builder){
        $s = request()->get($this->filterName());
        return $builder->where($this->table . '.name' , 'LIKE' , "%{$s}%");
    }
}