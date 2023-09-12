<div class="row justify-content-center mt-4">
    <div class="col-sm-12 col-lg-8">
        <div class="card">
            <div class="card-header text-success">
                <h4 class="mb-0 fs-5">Latest URLs</h4>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="table-dark">
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