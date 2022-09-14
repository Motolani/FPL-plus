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

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 mt-5 pt-5 mx-auto col-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Vertical Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
            
                <form class="form form-vertical" action="{{url('admin/post/category')}}" method="post">
                @csrf
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="first-name-vertical">Category Name</label>
                        <input type="text" id="first-name-vertical" class="form-control" name="name"
                            placeholder="Category Name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <label for="email-id-vertical">About</label>
                        <input type="text" id="email-id-vertical" class="form-control" name="about"
                            placeholder="What Category is about">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
       
    </div>
    </section>
@endsection