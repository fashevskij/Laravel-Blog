@extends('front.layouts.layout')
@section('content')
@include('front.layouts.sidebar')
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Posts
        </h2>

    </div>

    <div class="row tm-mb-90 tm-gallery">
        @foreach($posts->reverse() as $post)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-9 mb-5 ">
            <figure class="effect-ming tm-video-item" >
                <img style=" width: 100%; height: 200px; object-fit: cover;" src="{{asset('upload/'.$post->img)}}" alt="Image">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>{{$post->title}}</h2>
                    <a href="{{route('post.single', $post->slug)}}">View more</a>
                </figcaption>
            </figure>
            <div class="tm-text-gray">
                <p class="tm-text-gray-light">{{$post->getPostDate()}}</p>
                <a href="#">{{$post->category->title}}</a>
                @foreach($post->tags as $tag)
                <a href="">{{$tag->title}}</a>|
                @endforeach
                <p>{{$post->views}} views</p>
            </div>
        </div>
        @endforeach
    </div> <!-- row -->
    {{$posts->links('vendor.pagination.blog-post')}}
</div> <!-- container-fluid, tm-container-content -->
@endsection
