<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Facades\Auth;

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
    public function getUrls()
    {
        // Pull 5 latest urls from the databse
        $latestUrls = Url::latest()->take(5)->get();
        
        $userId = Auth::user()->id;
        
        // Pulls all the urls created by users
        $myUrls = Url::where('created_by', $userId)->get();

        return view('home', ["latestUrls" => $latestUrls, "myUrls" => $myUrls]);
    }
}
