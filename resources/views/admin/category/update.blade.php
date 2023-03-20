@extends('layouts.master')

@section('d_title')
Smart-Office | Category

@endsection

@section('content')

<div class="col-lg-12 grid-margin stretch-card ">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center"> Update Category</h4>

            <form class="forms-sample " method="POST" action="{{url('/edit/category')}}">
                @csrf
                <input type="hidden" name="category_id" value="{{$category_name->id}}">
                <div class="form-group ">
                    <label for="exampleInputName1">Category Name <code>*</code></label>

                    <input type="text" name="category_name" value="{{$category_name->category_name}}" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                </div>


                <div class="form-group ">
                    @error('category_name')
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
@endsection