<div class="row justify-content-center mt-4">
    <div class="col-sm-12 col-lg-8">
        <div class="card">
            <div class="card-header text-success">
                <h4 class="mb-0 fs-5">My URLs</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
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
                            <td title="{{ $myUrl->destination }}">{{ Str::limit($myUrl->destination, 50) }}</td>
                            <td>
                                <a class="text-success" href="{{ route('url.redirect', ['slug' => $myUrl->slug]) }}" target="_blank">
                                    {{ route('url.redirect', ['slug' => $myUrl->slug]) }}
                                </a>
                            </td>
                            <td class="text-center">{{ $myUrl->views }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <div class="mx-4">
                                        <a class="" title="Delete" href="{{ route('url.delete', ['id' => $myUrl->id]) }}">
                                            <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                        </a>
                                    </div>
                                    <div class="mx-1">
                                        <a class="" title="Copy to Clipboard" href="javascript:void(0);" onclick="copyToClipboard('{{ route('url.redirect', ['slug' => $myUrl->slug]) }}')">
                                            <i class="far fa-clipboard fa-lg text-primary"></i>
                                        </a>
                                    </div>
                                </div>
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
