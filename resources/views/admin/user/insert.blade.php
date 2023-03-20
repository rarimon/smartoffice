@extends('layouts.master')

@section('d_title')
Smart-Office|Insert User

@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="col-lg-12 grid-margin stretch-card" ">

    <div class=" card">
    <div class="card-body">
        <h4 class="card-title text-center">Add User</h4>

        <form class="forms-sample " method="POST" action="{{url('/user/add')}}">
            @csrf
            <div class="form-group ">
                <label for="exampleInputName1">Name <code>*</code></label>
                <input type="text" name="name" class="form-control text-light" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group ">
                @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group ">
                <label for="exampleInputName1">Phone</label>
                <input type="text" name="phone" class="form-control text-light" id="exampleInputName1" placeholder="Phone">
            </div>
            <div class="form-group ">
                @error('phone')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail3">Email address</label>
                <input type="email" name="email" class="form-control text-light" id="exampleInputEmail3" placeholder="Email">
            </div>
            <div class="form-group ">
                @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Password</label>
                <input type="password" name="password" class="form-control text-light" id="exampleInputPassword4" placeholder="Password">
            </div>
            <div class="form-group ">
                @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                <select class="form-control text-light" name="gender" id="exampleSelectGender">
                    <option value="">--Select--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group ">
                @error('gender')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <!-- <div class="form-group">
                <label>File upload</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
            </div> -->

            <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control text-light" name="address" id="exampleTextarea1" rows="4"></textarea>
            </div>
            <div class="form-group ">
                @error('address')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
            <a href="{{url('/user_list')}}" class="btn btn-primary " style="float:right"> <i class="mdi mdi-arrow-left-bold"></i> Back</a>
        </form>
    </div>
</div>
</div>





<!-- <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input size</h4>
            <p class="card-description"> Add classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>. </p>
            <div class="form-group">
                <label>Large input</label>
                <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
            </div>
            <div class="form-group">
                <label>Default input</label>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
            </div>
            <div class="form-group">
                <label>Small input</label>
                <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username">
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Select size</h4>
            <p class="card-description"> Add classes like <code>.form-control-lg</code> and <code>.form-control-sm</code>. </p>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Large select</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Default select</label>
                <select class="form-control" id="exampleFormControlSelect2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect3">Small select</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
    </div>
</div> -->
@endsection

@section('footer_script')
<script>
    @if(session('success'))
    onst Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
    })

    @endif
</script>



@endsection