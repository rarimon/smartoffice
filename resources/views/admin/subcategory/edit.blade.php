@extends('layouts.master')

@section('d_title')
Smart-Office | Subcategory

@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card ">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center"> Update Subcategory</h4>

            <form class="forms-sample " method="POST" action="{{url('/edit/subcategory')}}">
                @csrf
                <input type="hidden" name="subcategory_id" value="{{$subcategory_in->id}}">
                <div class="form-group ">
                    <label for="exampleInputName1">Category Name <code>*</code></label>

                    <select name="category_id" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                        @foreach($category_in as $category)
                        <option value="{{$category->id}}" {{$subcategory_in->category_id==$category->id ?'selected':''}}> {{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    @error('category_id')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="exampleInputName1">Subcategory Name <code>*</code></label>

                    <input type="text" name="subcategory_name" value="{{$subcategory_in->subcategory_name}}" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group ">
                    @error('subcategory_name')
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