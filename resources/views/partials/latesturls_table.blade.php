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