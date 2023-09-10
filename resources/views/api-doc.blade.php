@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>API Documentation</h2>
    <hr />
    <h3>Shorten URL</h3>
    <p>Shortens a URL and returns the shortened link.</p>

    <h4>Endpoint</h4>
    <pre><code class="bg-white"> POST /api/v1/shorten-url</code></pre>

    <h4>Request Parameters</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>destination</td>
                <td>string</td>
                <td>The long URL to be shortened. Required.</td>
            </tr>
        </tbody>
    </table>

    <h4>Example Request</h4>
    <pre><code class="bg-white"> POST /api/v1/shorten-url</code></pre>
    <pre class="bg-white"><code>
    {
        "destination": "https://internet.com/a-very-long-url-here"
    }
    </code></pre>

    <h4>Success Response</h4>
    <pre class="bg-white"><code>
        {
            "destination": "https://internet.com",
            "slug": "QKxzH",
            "updated_at": "2023-09-10T12:25:19.000000Z",
            "created_at": "2023-09-10T12:25:19.000000Z",
            "id": 11,
            "shortened_url": "https://shotr/QKxzH"
        }
    </code></pre>

    <h4>Error Responses</h4>
    <p>If the request is invalid or if a non-valid URL is provided, the API will return an appropriate error response.</p>
    
    <h5>Validation Error Response</h5>
    <pre class="bg-white"><code>
    {
        "message": "The given data was invalid.",
        "errors": {
            "destination": [
                "The destination field is required.",
                "The destination must be a valid URL."
            ]
        }
    }
    </code></pre>
@endsection