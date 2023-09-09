<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shortenedUrls = [
            (object) [
                "original_url" => "https://google.com",
                "shortened_url" => "shortlnk.cc/abcd"
            ],
            // Add more objects to your array as needed
        ];
        return view('home', ["shortenedUrls" => $shortenedUrls]);
    }
}
