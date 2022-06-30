<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
class CategoryController extends Controller
{
    public function show(Category $category){
        $pipelines = app(Pipeline::class)
        ->send($category->listings())
        ->through([
            new \App\QueryFilters\City(Listing::class),
            new \App\QueryFilters\Service(Listing::class),
        ])
        ->thenReturn();
        $data = $pipelines->with(['service', 'user' => function($q){
            return $q->with(['meta']);
        }])->orderBy('id', 'DESC');

            
       return view('category.index', ['category' => $category, 'listings' => $data->paginate(PREPAGE)]);
    }
}
