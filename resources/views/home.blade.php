@extends('layouts.app')

@section('content')
<div class="home-main">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Input field and form -->
            <form action="{{ route('store.url') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="url" class="form-control url-input-box" name="destination" placeholder="Enter URL" required>
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
                    <h4 class="mb-0">My URLs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Destination URL</th>
                                    <th>Shortened URL</th>
                                    <th class="text-center">Views</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($myUrls as $myUrl)
                                    <tr>
                                        <td title={{$myUrl->destination}}>{{ Str::limit($myUrl->destination, 50) }}</td>
                                        <td>
                                            <a class="text-success" href="{{ route('url.redirect', ['slug' => $myUrl->slug]) }}" target="_blank">
                                                {{ route('url.redirect', ['slug' => $myUrl->slug]) }}
                                            </a>
                                        </td>
                                        <td class="text-center">{{ $myUrl->views }}</td>
                                        <td class="text-center">
                                            <a class="" title="Delete" href="{{ route('url.delete', ['id' => $myUrl->id]) }}">
                                                <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                            </a>
                                            <span class="text-muted mx-1">|</span>
    <a class="" title="Copy to Clipboard" href="javascript:void(0);" onclick="copyToClipboard('{{ route('url.redirect', ['slug' => $myUrl->slug]) }}')">
        <i class="far fa-clipboard fa-lg text-primary"></i>
    </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-muted text-center">No URLs created by you!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                                    <th class="text-center">Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestUrls as $latestUrl)
                                    <tr>
                                        <td title={{$latestUrl->destination}}>{{ Str::limit($latestUrl->destination, 50) }}</td>
                                        <td>
                                            <a class="text-success" href="{{ route('url.redirect', ['slug' => $latestUrl->slug]) }}" target="_blank">
                                                {{ route('url.redirect', ['slug' => $latestUrl->slug]) }}
                                            </a>
                                        </td>
                                        <td class="text-center">{{ $latestUrl->views }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No URLs available</td>
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
</div>
@endsection
