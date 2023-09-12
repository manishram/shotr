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
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
              </svg>
              
              <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">  
            </div>
            @endif

        </div>
    </div>

    @include('partials.myurls_table')
    @include('partials.latesturls_table')
</div>
</div>
@endsection
