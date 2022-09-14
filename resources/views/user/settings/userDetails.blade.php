@extends('layouts.header')
@section('profile-status', 'active')
@section('content')

    <!--================ End banner Area =================-->

    <!--================ Start Blog Post Area =================-->
<div  class="container align-items-center mt-5">
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class= "col-10 mt-5">
            <div class="card my-5">
                <div class="card-header text-center" style="background-color: #00f4de; border-color: #00f4de;">
                    <h2 style="color: #000000">Profile Settings</h2>
                </div>
                @if (session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-center" role="alert">
                        {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="card-body text-center">
                
                    <div class="col-12">
                        <h3 class="mb-3 mt-3">User Details</h3>
                        {{-- <div class="row"> --}}
                            <form action="{{url('details/settings/update')}}" class="pb-2" method="post">
                                @csrf
                                <div class="mt-10 row ">
                                    <div class="col-4 pt-2">
                                        <label for="user_name" class="form-label"><strong>User Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="user_name" type="text" name="user_name" value="{{Auth::user()->name}}"
                                            class="single-input form-control">
                                    </div>
                                </div>
                                <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="email" class="form-label"><strong>Email</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="email" type="email" name="email" value="{{Auth::user()->email}}"
                                            disabled class="single-input form-control">
                                    </div>
                                </div>

                                <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="phoneNumber" class="form-label"><strong>Phone Number</strong></label>
                                    </div>
                                    
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="phone_number" type="text" name="phone_number" value="{{Auth::user()->phonenumber}}"
                                            class="single-input form-control">
                                    </div>
                                </div>
                                @if(Auth::user()->fpl_id == NULL)
                                    <div class="mt-10 row">
                                        <div class="col-4 pt-2">
                                            <label for="email" class="form-label"><strong>Fpl ID</strong></label>
                                        </div>
                                        <div class="col-7 d-flex justify-content-start">
                                            <input type="text" name="fpl_id" placeholder="Log into FPL site, select the `points` tab, get your FPL ID from the url. Enter it here"
                                            required class="single-input form-control">
                                        </div>
                                    </div>
                                @endif
                                
                                
                                <div class="row ">
                                    <div class="col-11 pt-4 ">
                                        <button id="settingBtn" type="submit" class="btn btn-success float-right" > Update</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      
@endsection
                        