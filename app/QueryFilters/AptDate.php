<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class AptDate extends Filter{
    
    public function filterName(){
        return 'date';
    }

    public function applyFilter($builder){
        $date = toGregorian(request()->get($this->filterName()));
        $date = date('Y-m-d', strtotime($date));
        return $builder->where($this->table . '.date_start' ,  'LIKE', "%{$date}%");
    }
}