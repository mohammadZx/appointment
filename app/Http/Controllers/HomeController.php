<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Listing;
use App\Models\ListingService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(['services' => fn($q) => $q->with('subservices')])->get();
        $listins = Listing::with(['service' => fn($q) => $q->with(['category'])])->get();
        $comments = Comment::with(['commentable', 'user'])->get();
        return view('pages.index', [
            'categories' => $categories,
            'listings' => $listins,
            'comments' => $comments
        ]);
    }
}
