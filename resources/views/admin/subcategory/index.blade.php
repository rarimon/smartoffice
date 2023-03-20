@extends('layouts.master')

@section('d_title')
Smart-Office|Subcategory

@endsection

@section('content')

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
                            <th>Added By</th>
                            <th>Creat Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{--<tbody>
                        @foreach($category_info as $index=> $category)
                        <tr>
                            <td>{{$category_info->FirstItem()+$index}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{App\Models\User::find($category->added_by)->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>
                        <div class="template-demo">

                            <a href="{{url('/update/category')}}/{{$category->id}}" class="btn btn-outline-secondary btn-icon-text"> Edit
                            </a>
                            <a href="{{url('/category/delete')}}/{{$category->id}}" class="btn btn-outline-danger btn-icon-text">
                                Delete</a>

                        </div>

                    </td>
                    </tr>

                    @endforeach



                    </tbody>--}}
                </table>



            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 grid-margin stretch-card " style="float:left">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center">Subcategory Add</h4>

            <form class="forms-sample " method="POST" action="{{url('/insert/category')}}">
                @csrf
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


@section('footer_script')
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
@endsection