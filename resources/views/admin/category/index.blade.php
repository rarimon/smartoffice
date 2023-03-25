@extends('layouts.master')

@section('d_title')
Smart-Office|Category

@endsection

@section('content')
@if(session('success_del'))
<div class="alert alert-success">
    {{session('success_del')}}
</div>

@endif

<div class="col-lg-8 grid-margin stretch-card " style="float:left">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center">Category List</h4>

            <div class="table-responsive">
                <form action="{{url('/category/delete_all')}}" method="post">
                    @csrf

                    <table class="table table-striped text-light">
                        <thead class="text-center">

                            <tr>
                                <th><input type="checkbox" id="mark_del"> Check All</th>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Added By</th>
                                <th>Creat Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category_info as $index=> $category)
                            <tr>
                                <td><input type="checkbox" name="mark_all_del[]" value="{{$category->id}}"></td>
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



                        </tbody>
                    </table>


                    {{$category_info->links()}}


                    <button type="submit" class="btn btn-success mr-2">Delete All</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 grid-margin stretch-card " style="float:left">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center">Category Add</h4>

            <form class="forms-sample " method="POST" action="{{url('/insert/category')}}">
                @csrf
                <div class="form-group ">
                    <label for="exampleInputName1">Category Name <code>*</code></label>
                    <input type="text" name="category_name" class="form-control text-light" id="exampleInputName1" placeholder="Name">
                </div>


                <div class="form-group ">
                    @error('category_name')
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

<script>
    $("#mark_del").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>



@endsection