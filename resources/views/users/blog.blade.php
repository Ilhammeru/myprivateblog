@extends('layouts.blog')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 col-xs-12 col-xl-6">
            <div class="blog">
                <div class="blog-image blog-image_main">
                    <img src="{{ asset('blog/content_thumb_large_1.webp') }}" alt="">
                </div>
                <div class="blog-title blog-title_main mt-3">
                    <h4 class="blog-title--text-1">Biden: US to Bolster European Military Presence</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 col-xl-6"></div>
    </div>
@endsection