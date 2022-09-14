@extends('admin.layouts.head')
{{-- @section('articles-status', 'active') --}}

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" role="alert">
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
<div class="row">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Editor</h3>
                <p class="text-subtitle text-muted">Textarea with rich features </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Editor</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section class="section">
        <form action="{{url('admin/post/'. $post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("patch")
            
            <div class="card col-12">
                <div class="card-header">
                    <h4 class="card-title">Full Editor</h4>
                </div>
                
                <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <h6><strong>Select Post Type</strong></h6>
                                <fieldset class="form-group">
                                    <select class="form-select" name="post_type" id="basicSelect">
                                        @if($post->type_id == 1)
                                            <option value="{{$post->type_id}}" selected> Articles</option>
                                        @else
                                            <option value="{{$post->type_id}}" selected > Team Reveal</option>
                                        @endif
                                        @foreach ($postCat as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-sm-3 mx-auto">
                                <h6>Tags</h6>
                                <input class="form-control form-control-sm" type="text" name="tags" placeholder="Seperate each tag with a comma">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Title</h6>
                                <input class="form-control form-control-sm" type="text" name="title" value="{{$post->title}}">
                            </div>
                            <div class="col-sm-3 mx-auto">
                                <h6>Header Title</h6>
                                <input class="form-control form-control-sm" type="text" name="menu_title" value="{{$post->metaTitle}}">
                            </div>
                        </div>
                        
                        <p><strong>Content</strong> </p>
                        <div class="form-group">
                            <label> Body </label>
                            <textarea class="form-control" id="description" name="content"
                                name="description">{{$post->content}}</textarea>
                        </div>
                    
                    <div class="mt-3">
                        <button name="action" type="submit" class="btn btn-success" value="save">Save</button>
                        <button name="action" type="submit" class="btn btn-primary" value="preview">Preview</button>
                        <button name="action" type="submit" class="btn btn-secondary" value="publish">Publish</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
</div>
@endsection