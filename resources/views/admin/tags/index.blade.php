<?php
//наследуем admin.layouts.layout (подключем к этому адресу)
?>
@extends('admin.layouts.layout')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tags</li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

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
                    <table class="table table-bordered">
                        <thead>
                        <tr style="font-size: 20px">
                            <th style="width: 15px">id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="font-size: 20px;">
                            @foreach($tags as $tag)
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->title}}</td>
                                <td>{{$tag->slug}}</td>
                            <td><a  href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-info float-left"> <i class="fas fa-edit"></i></a>
                                <form action="{{route('admin.tags.destroy',  $tag->id)}}" method="post" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                <button  class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="card-footer clearfix">
                        {{$tags->links('vendor.pagination.bootstrap-4')}}{{--
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>--}}
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

@endsection
