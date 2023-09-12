@extends('layouts.app')

@section('content')
<div class="home-main">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- Form for shortening urls --}}

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

            {{-- show success alert --}}
            @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
            @endif

        </div>
    </div>

    @include('partials.myurls_table')
    @include('partials.latesturls_table')
</div>
</div>
@endsection
