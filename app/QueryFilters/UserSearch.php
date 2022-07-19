<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class UserSearch extends Filter{
    
    public function filterName(){
        return 'search';
    }

    public function applyFilter($builder){
        $param = "%" . request()->get($this->filterName()) . "%";
        
        return $builder->where($this->table . '.name' , 'LIKE' , $param )->orWhere($this->table . '.phone' , 'LIKE' , $param );
    }
}