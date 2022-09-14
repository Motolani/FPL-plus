@extends('admin.layouts.head')
{{-- @section('articles-status', 'active') --}}

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-success" role="alert">
        {{ session('error') }}
    </div>
@endif
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
    </div>
@endif
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Draft</h3>
                <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        {{-- <div class="col-12 mx-3 my-3">
            <a href="#" class="btn btn-success"> Publish Post</a>
        </div> --}}
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Img</th>
                            <th>Created</th>
                            <th>Author</th>
                            <th>Tags</th>
                            <th>Type</th>
                            {{-- <th>Comments</th> --}}
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($posts))
                        @foreach ( $posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td >
                                    <img src="{{ asset('public/uploads/'.$post->post_img) }}" alt="img" width="50%">
                                </td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->author}}</td>
                                <td>ww</td>
                                <td>{{$post->type}}</td>
                                <td>
                                    <a href="{{url("/admin/post/".$post->id. "/edit")}}" class="btn btn-outline-primary">view post</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection