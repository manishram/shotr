@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Input field and form -->
            <form action="{{ route('store.url') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="url" class="form-control" name="destination" placeholder="Enter URL" required>
                    <button type="submit" class="btn btn-success">Shorten URL</button>
                </div>
                @error('destination')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>

    <!-- Center the table in a new row -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Latest URLs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Destination URL</th>
                                    <th>Shortened URL</th>
                                    <th>Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestUrls as $latestUrl)
                                    <tr>
                                        <td title={{$latestUrl->destination}}>{{ $latestUrl->destination }}</td>
                                        <td>
                                            <a href="{{ route('url.redirect', ['slug' => $latestUrl->slug]) }}" target="_blank">
                                                {{ route('url.redirect', ['slug' => $latestUrl->slug]) }}
                                            </a>
                                        </td>
                                        <td>{{ $latestUrl->views }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No URLs available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
