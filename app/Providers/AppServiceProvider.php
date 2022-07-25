<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Option;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::with(['services' => fn($q) => $q->with('subservices')])->get();
        view()->share('categories', $categories);
        
        $options = [];
        if(Schema::hasTable('options')){
            $options = Option::where('option_key', 'permission')->get();
        }

        
        foreach($options as $permission){
            Gate::define($permission->option_value, function($user) use($permission){
                return $user->hasPermission($permission->option_value);
            });
        }
        
    }
}
