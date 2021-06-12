@extends('front.layouts.layout')
@section('content')


    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4 text-center">
            <h2 class="col-12 tm-text-primary">{{$post->title}}</h2>
        </div>
        <div class="row tm-mb-90">

            <div class="col-md-3 col-sm-12 mt-2">
                <img src="{{asset('upload/'. $post->img)}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-9 col-sm-12 mt-2">
                <div class="tm-bg-gray tm-video-details">
                    <h3 class="tm-text-gray-dark mb-3">Content</h3>
                    <p class="mb-4">
                        {!! $post->content !!}
                    </p>

                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">Category</h3>
                        <p>{{$post->category->title}}</p>
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                        @foreach($post->tags as $tag)
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">{!! $tag->title !!}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Related Photos
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{asset('assets/front/img/img-03.jpg')}}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Hangers</h2>
                        <a href="#">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">16 Oct 2020</span>
                    <span>12,460 views</span>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

@endsection
