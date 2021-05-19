<?php
//наследуем admin.layouts.layout (подключем к этому адресу)
?>
@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Tags</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                        <li class="breadcrumb-item active">Edit Tags</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Tags</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="{{route('admin.posts.update', ['post'=>$post->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group col-sm-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$post->title}}" >

                        </div>
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" >{{$post->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="5">{{$post->content}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected="selected" disabled>Select category</option>
                                    @foreach($categories as $id=>$title)
                                        <option value="{{$id}}" @if($id==$post->category_id) selected @endif>{{$title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tag_id">Tags</label>
                                <select name="tag_id[]" id="tag_id" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    @foreach($tags as $id=>$title)
                                        <option value="{{$id}}" @if(in_array($id, $post->tags->pluck('id')->all())) selected @endif>{{$title}}</option>
                                    @endforeach
                                </select>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img" >
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                        <img class="profile-user-img img-fluid img-circle"  src="{{$post->getImg()}}" alt="" >
                                </div>

                            </div> <!-- /.form-group -->
                        </div>
                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->



        <!-- /.content -->

@endsection
