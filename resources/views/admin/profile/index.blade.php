@extends('layouts.master')

@section('d_title')
Smart-Office|Profile

@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>

@endif

@if(session('success_pas'))
<div class="alert alert-success">
    {{session('success_pas')}}
</div>

@endif

@if(session('wrong_pas'))
<div class="alert alert-warning">
    {{session('wrong_pas')}}
</div>

@endif


<h4 class="card-title text-center"> Update Profile</h4>
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card ">

        <div class="card">

            <div class="card-body">



                <form class="forms-sample " method="POST" action="{{url('/update/profile')}}">
                    @csrf

                    <div class="form-group ">
                        <label for="exampleInputName1"> Name <code>*</code></label>

                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                    </div>


                    <div class="form-group ">
                        @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Update</button>



                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card ">

        <div class="card">

            <div class="card-body">



                <form class="forms-sample " method="POST" action="{{url('/update/password')}}">
                    @csrf

                    <div class="form-group ">
                        <label for="exampleInputName1">Old Password <code>*</code></label>

                        <input type="text" name="old_password" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group ">
                        @error('old_password')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group ">
                        <label for="exampleInputName1">New Password <code>*</code></label>

                        <input type="password" name="password" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group ">
                        @error('password')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputName1">Confirmed Password <code>*</code></label>

                        <input type="password" name="password_confirmation" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                    </div>



                    <button type="submit" class="btn btn-success mr-2">Update</button>



                </form>

            </div>
        </div>
    </div>


    <div class="col-lg-12 grid-margin stretch-card ">

        <div class="card">

            <div class="card-body">



                <form class="forms-sample " method="POST" action="{{url('/update/photo')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group ">
                        <label for="exampleInputName1"> Profile Photo <code>*</code></label>

                        <input type="file" name="profile_photo" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                    </div>


                    <div class="form-group ">
                        @error('profile_photo')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Update</button>



                </form>

            </div>
        </div>
    </div>
</div>


@endsection