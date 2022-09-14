@extends('admin.layouts.head')
{{-- @section('articles-status', 'active') --}}

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Create New Plan</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{url('admin/store/sub/plan')}}" method="post" >
                @csrf
                    <div class="form-body">
                        <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Plan Name</label>
                                <div class="position-relative">
                                    <input type="text" name="plan_name" class="form-control" placeholder="Input with icon left" id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i data-feather="name"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            
                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Duration</label>
                                <div class="position-relative">
                                    <input type="text" name="payment_interval" class="form-control" placeholder="Email" id="email-id-icon">
                                    <div class="form-control-icon">
                                        <i data-feather="time"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="cash-id-icon">Price</label>
                                <div class="position-relative">
                                    <input type="text" name="amount" class="form-control" placeholder="price" id="cash-id-icon">
                                    <div class="form-control-icon">
                                        <i data-feather="cash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="text-id-icon">Description</label>
                                <div class="position-relative">
                                    <textarea name="description" placeholder="Text" id="text-id-icon"></textarea>
                                    <div class="form-control-icon">
                                        <i data-feather="write"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class='form-check'>
                                <div class="checkbox mt-2">
                                    <input type="checkbox" id="remember-me-v" class='form-check-input' checked>
                                    <label for="remember-me-v">Remember Me</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                            {{-- <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button> --}}
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
@endsection