<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    
    public function store(Request $request){
        $request->validate([
            'destination' => 'required|url',
        ]);
        
        do {
            $slug = Str::random(5);
        } while (Url::where('slug', $slug)->exists());

        $url = new Url();
        $url->destination = $request->destination;
        $url->slug = $slug;
        $url->created_by = Auth::user()->id;
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
    public function deleteUrl($id){
        $user = Auth::user()->id;
        Url::where(['id'=>$id, 'created_by'=> $user])->delete();

        return redirect()->back()->with('success', 'URL deleted successfully');
    }
}
