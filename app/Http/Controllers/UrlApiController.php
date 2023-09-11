<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlApiController extends Controller
{
    public function shortenUrlApi(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'destination' => 'required|url',
        ]);

        // Create a new shortened URL
        $slug = Str::random(5);
        $shortenedUrl = new Url([
            'destination' => $request->input('destination'),
            'slug' => $slug,
        ]);
        $shortenedUrl->save();

        // Build the response JSON for shortened url
        $response = [
            'destination' => $shortenedUrl->destination,
            'slug' => $shortenedUrl->slug,
            'updated_at' => $shortenedUrl->updated_at,
            'created_at' => $shortenedUrl->created_at,
            'id' => $shortenedUrl->id,
            'shortened_url' => route('url.redirect', ['slug' => $shortenedUrl->slug])
        ];

        return response()->json($response, 200);
    }
}
