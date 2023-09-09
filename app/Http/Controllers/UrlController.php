<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    
    public function store(Request $request){
        $request->validate([
            'destination' => 'required|url',
        ]);
    
        $url = new Url();
        $url->destination = $request->destination;
        $url->slug = Str::random(5);
        $url->save();
    
        return redirect()->back()->with('success', 'URL shortened successfully');
    }
    public function redirect($slug)
    {
        // Find the URL by the slug
        $url = Url::where('slug', $slug)->first();
    
        // Check if the URL exists
        if (!$url) {
            return abort(404); // Handle the case where the slug doesn't exist
        }
    
        // Increment the view count
        $url->increment('views');
    
        // Redirect to the original URL
        return Redirect::to($url->destination);
    }
}
