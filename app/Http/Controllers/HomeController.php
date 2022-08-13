<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Listing;
use App\Models\ListingService;
use App\Models\Service;
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
        $listins = Listing::with(['service' => fn($q) => $q->with(['category'])])->limit(9)->get();
        $comments = Comment::with(['commentable', 'user'])->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();
        $services = Service::with(['category', 'subservices'])->limit(6)->get();
        return view('pages.index', [
            'listings' => $listins,
            'comments' => $comments,
            'services' => $services
        ]);
    }

    public function faq(){
        return view('pages.faq');
    }


    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
