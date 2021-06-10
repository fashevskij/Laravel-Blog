@extends('front.layouts.layout')
@section('content')
@include('front.layouts.sidebar')
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Posts
        </h2>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
            </form>
        </div>
    </div>

    <div class="row tm-mb-90 tm-gallery">
        @foreach($posts as $post)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-9 mb-5">
            <figure class="effect-ming tm-video-item">
                <img style="height: 200px; width: 200px" src="{{asset('upload/'.$post->img)}}" alt="Image" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>{{$post->title}}</h2>
                    <a href="{{route('post.single', $post->id)}}">View more</a>
                </figcaption>
            </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span class="tm-text-gray-light">{{$post->created_at}}</span>
                <span>9,906 views</span>
            </div>
        </div>
        @endforeach
    </div> <!-- row -->
    {{$posts->links('vendor.pagination.blog-post')}}
</div> <!-- container-fluid, tm-container-content -->
@endsection
