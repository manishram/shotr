@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter URL" id="urlInput">
                <button class="btn btn-success" id="shortenButton">Shorten URL</button>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h4>Latest URLs</h4>
            </div>
            <div class="table-responsive rounded">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>Original URL</th>
                            <th>Shortened URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shortenedUrls as $shortenedUrl)
                            <tr>
                                <td>{{ $shortenedUrl->original_url }}</td>
                                <td>{{ $shortenedUrl->shortened_url }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
