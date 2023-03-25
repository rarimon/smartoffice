@extends('layouts.master')

@section('d_title')
Smart-Office|Subcategory

@endsection

@section('content')
@if(session('warning'))
<div class="alert alert-danger">
    {{session('warning')}}
</div>
@endif


@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="col-lg-8 grid-margin stretch-card " style="float:left">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center">Subcategory List</h4>

            <div class="table-responsive">
                <table class="table table-striped text-light">
                    <thead class="text-center">

                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <th>Added By</th>
                            <th>Creat Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategory_info as $index=> $subcategory)
                        <tr>

                            <td>{{$subcategory_info->FirstItem()+$index}}</td>
                            <td>{{App\Models\Category::find($subcategory->category_id)->category_name}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>{{App\Models\User::find($subcategory->added_by)->name}}</td>
                            <td>{{$subcategory->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="template-demo">

                                    <a href="{{url('/update/subcategory')}}/{{$subcategory->id}}" class="btn btn-outline-secondary btn-icon-text"> Edit
                                    </a>
                                    <a href="{{url('/category/delete')}}/{{$subcategory->id}}" class="btn btn-outline-danger btn-icon-text">
                                        Delete</a>

                                </div>

                            </td>
                        </tr>

                        @endforeach



                    </tbody>
                </table>
                {{$subcategory_info->links()}}



            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 grid-margin stretch-card " style="float:left">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center">Subcategory Add</h4>

            <form class="forms-sample " method="POST" action="{{url('/insert/subcategory')}}">
                @csrf
                <div class="form-group ">
                    <label for="exampleInputName1">Category Name <code>*</code></label>
                    <select name="category_id" class="form-control text-light">
                        <option value="">Select Category</option>
                        @foreach( $category_info as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                    <input type="text" name="subcategory_name" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                </div>


                <div class="form-group ">
                    @error('subcategory_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success mr-2">Submit</button>

                <button type="reset" class="btn btn-danger">Cancel</button>

            </form>

        </div>
    </div>
</div>

@endsection


{{--@section('footer_script')
@if(session('success'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif


@if(session('delete'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif




@if(session('update'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
@endsection--}}