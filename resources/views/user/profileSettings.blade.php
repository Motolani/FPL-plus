@extends('layouts.header')
@section('profile-status', 'active')
@section('content')

    <!--================ End banner Area =================-->

    <!--================ Start Blog Post Area =================-->
 <!-- Modal -->
 
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
                            <form action="{{url('details/settings')}}" class="pb-2" method="get">
                                {{-- @csrf --}}
                                <div class="mt-10 row ">
                                    <div class="col-4 pt-2">
                                        <label for="user_name" class="form-label"><strong>User Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="user_name" type="text" name="user_name" value="{{Auth::user()->name}}"
                                            disabled class="single-input form-control">
                                    </div>
                                </div>
                                <div class="mt-10 row ">
                                    <div class="col-4 pt-2">
                                        <label for="firstName" class="form-label"><strong>First Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="firstName" type="text" name="first_name" value="{{Auth::user()->firstname}}"
                                        disabled class="single-input form-control">
                                    </div>
                                    
                                </div>
                                <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="lastName" class="form-label"><strong>Last Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input id="lastName" type="text" name="last_name" value="{{Auth::user()->lastname}}"
                                        disabled class="single-input form-control">
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
                                            disabled class="single-input form-control">
                                    </div>
                                </div>
                                {{-- <div class="mt-10 row">
                                    <div class="col-4 pt-2">
                                        <label for="email" class="form-label"><strong>Team Name</strong></label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input type="text" name="team_name" value="{{Auth::user()->phonenumber}}"
                                        disabled class="single-input form-control">
                                    </div>
                                </div> --}}
                                
                                
                                <div class="row ">
                                    <div class="col-11 pt-4 ">
                                        <button id="settingBtn" type="submit" class="btn btn-success float-right" > Edit</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="row pb-3">
                                <div class="col-7 pt-4 ">
                                    <h4> Change Password </h4>
                                </div>
                                <div class="col-4 pt-2 ">
                                    <a id="settingBtn" href="{{url('settings/update/password/')}}" class="btn btn-success float-right"> Edit</a>
                                </div>
                            </div>
                            <hr>
                    </div>
                    
                    <div class="col-12 pt-5">
                        
                        <h3 class="mb-30">Subscription Details</h3>
                        @if(isset($activeSub))
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: #00f4de; border-color: #00f4de;" >
                                        <th scope="col" style="color: #000000">#</th>
                                        <th scope="col" style="color: #000000">Plan</th>
                                        <th scope="col" style="color: #000000">Start</th>
                                        <th scope="col" style="color: #000000">Due</th>
                                        <th scope="col" style="color: #000000">Status</th>
                                        <th scope="col" style="color: #000000">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$activeSub->plan_name}}</td>
                                        <td>{{$activeSub->start_date}}</td>
                                        <td>{{$activeSub->due_date}}</td>
                                        <td>
                                            @if($activeSub->status == 0)
                                                <span> Inactive </span>
                                            @else
                                                <span> Active </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($activeSub->status == 0)
                                                <!-- Button trigger modal -->
                                                {{-- <a href="{{url('activate/sub/' .$activeSub->id)}}" class="btn btn-success"> Activate </a> --}}
                                                <p>Subscription Deactivated, Wait till current plan is over to renew</p>
                                                
                                            @else
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deactivate">
                                                    Deactivate 
                                                </button>
                                                <div class="modal fade" id="deactivate" tabindex="2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('deactivate/sub/'.$activeSub->id)}}" method="post">
                                                            {{-- <form action="{{route('deactivate',$activeSub->id)}}" method="post"> --}}
                                                            @csrf
                                                            <div class="modal-content text-center">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-danger bold" id="deleteModalLabel">ARE YOU SURE YOU WANT TO DEACTIVATE YOUR SUBSCRIPTION ?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <!-- <span aria-hidden="true">&times;</span> -->
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Once Subscription is Deactivated, you would not be charged after this plan. </p>
                                                                    <p>It cannot also be activated until the End of your Current Plan</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No, Close</button>
                                                                    
                                                                    <button type="submit"  class="btn btn-danger">Yes, Deactivate</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="row pb-3">
                                <div class="col-7 pt-4 ">
                                    <h4> Activate Plan </h4>
                                </div>
                                <div class="col-4 pt-2 ">
                                    <a id="settingBtn" href="{{url('activate/sub')}}" class="btn btn-success float-right"> Activate</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-1"></div>
        
    </div>
    
</div>
@endsection
@section('script')
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endsection