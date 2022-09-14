@extends('layouts.header')
@section('profile-status', 'active')
@section('content')

    <!--================ End banner Area =================-->

    <!--================ Start Blog Post Area =================-->
<div  class="container align-items-center mt-5">
    <div class="row mt-5">
        <div class= "col-12 mt-5">
            <div class="card my-5">
                <div class="card-header text-center">
                Featured
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
                        <h3 class="mb-30">Form Element</h3>
                        {{-- <div class="row"> --}}
                            <form action="{{url('register/fpl/manager')}}" class="" method="post">
                                @csrf
                                <div class="mt-10 row ">
                                    <div class="col-4 pt-2">
                                        <label for="firstName" class="form-label"><strong>First Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="firstName" type="text" name="first_name" placeholder="Enter your Firstname here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Firstname here'"
                                        required class="single-input form-control">
                                    </div>
                                    
                                </div>
                                <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="lastName" class="form-label"><strong>Last Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="lastName" type="text" name="last_name" placeholder="Enter your Lastname here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Lastname here'"
                                            required class="single-input form-control">
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

                                <div class="input-group mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="phoneNumber" class="form-label"><strong>Phone Number</strong></label>
                                    </div>
                                    @isset($countries)
                                            <div class="col-3 pt-2 d-flex justify-content-start" >
                                                <select id="country_code" style="width:200px;" class="operator" name="country_code" > 
                                                    <option value="selected" selected>select country code</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{$country->phonecode}}">{{$country->iso ." - ". $country->phonecode}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    @endisset
                                    
                                    <div class="col-5"><input type="text" name="phone_number" placeholder="Enter your Phone Number here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Phone Number here'"
                                        required class="single-input form-control"></div>
                                </div>
                                <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="email" class="form-label"><strong>Team Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input type="text" name="team_name" placeholder="Enter your Team Name here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Team Name here'"
                                        required class="single-input form-control">
                                    </div>
                                </div>
                                
                                <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="email" class="form-label"><strong>FPL ID</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input type="text" name="fpl_id" placeholder="Log into FPL site, select the `points` tab, get your FPL ID from the url. Enter it here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Log into FPL site, select the `points` tab, get your FPL ID from the url. Enter it here'"
                                        required class="single-input form-control">
                                    </div>
                                </div>
                                
                                <div class="input-group mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="sub_plan" class="form-label"><strong>Select plan</strong></label>
                                    </div>
                                    @isset($subCat)
                                            <div class="col-7 pt-2 d-flex justify-content-start" >
                                                <select id="sub_plans" style="width:200px;" class="operator" name="plan"> 
                                                    <option value="selected" selected>Select Plan</option>
                                                    @foreach ($subCat as $sub)
                                                        <option value="{{$sub->name}}">{{$sub->name ." - N". $sub->amount ." - " . $sub->payment_interval}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    @endisset

                                </div>
                                
                                <div class="row ">
                                    <div class="col-11 pt-4 ">
                                        <button type="submit" class="btn btn-success float-right"> Submit</button>
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
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script>
    $(function(){
        $("#country_code").select2();
    }); 
</script>

<script>
$(function(){
        $("#sub_plans").select2();
    }); 
</script>
@endsection