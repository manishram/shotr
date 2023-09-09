<?php

namespace App\Http\Controllers;

use App\Models\Url;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $latestUrls = Url::latest()->take(5)->get(); // Get the latest 5 URLs
        return view('home', ["latestUrls" => $latestUrls]);
    }
}