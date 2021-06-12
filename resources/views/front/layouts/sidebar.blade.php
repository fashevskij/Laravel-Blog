<div class="col-md-12 col-sm-12 mt-2">
    <div class="tm-bg-gray tm-video-details">
        <div class="tm-paging d-flex ">
            <h4 class="tm-text-gray-dark mt-4">All Category:</h4>
            @foreach($categories as $category)
            <a class="tm-paging-link" style="width: auto !important;" href="{{route('post.category',"$category->slug")}}">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="tm-paging d-flex">
            <h4 class="tm-text-gray-dark mt-4">All Tags:</h4>
           @foreach($tags as $tag)
                <a class="tm-paging-link" style="width: auto !important;" href="{{route('post.tag',$tag->slug)}}">{{$tag->title}}</a>
            @endforeach
        </div>
    </div>
</div>
