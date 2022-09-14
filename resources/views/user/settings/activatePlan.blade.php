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
                    <h2 style="color: #000000">Activate Subscription</h2>
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
                        {{-- <div class="row"> --}}
                            <form action="{{url('activate/sub')}}" class="pb-2" method="post">
                                @csrf
                                <div class="mt-10 mb-3 mt-3 row ">
                                    <div class="col-2"></div>
                                    <form action="#" class="pb-2" method="post">
                                        @csrf
                                        @if(isset($plans))
                                            @foreach( $plans as $plan)
                                                    <div class="col-4 pt-2">
                                                        <label for="user_name" class="form-label"><strong>Plans</strong></label>
                                                    </div>
                                                    <div class="col-5">
                                                        <select id="sub_plans" style="width:200px;" class="operator" name="plan"> 
                                                            <option value="selected" selected>Select Plan</option>
                                                            <option value="{{$plan->name}}">{{$plan->name ." - N". $plan->amount ." - " . $plan->payment_interval}}</option>
                                                        </select>
                                                    </div>
                                                    
                                            @endforeach
                                        @endif
                                        <div class="col-12 d-flex justify-content-end">
                                            <button  type="submit" class="btn btn-success float-right" > Activate</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      
@endsection
                        