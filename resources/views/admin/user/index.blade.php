@extends('layouts.master')

@section('d_title')
Smart-Office|User List

@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title text-center">User List</h4>

            <p class="card-description " style="float:left">
                Total User = <code class="text-success">{{$total_user}}</code>
            </p>
            <p class="card-description text-right">
                <a href="{{url('/insert/user')}}" class="btn btn-success btn-icon-text">
                    <i class="mdi mdi-account-plus"></i>Add New User</a>
            </p>
            <div class="table-responsive">
                <table class="table table-striped text-light">
                    <thead class="text-center">

                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Creat Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_info as $index=>$user)
                        <tr>
                            <td class="">
                                {{$user_info->FirstItem()+$index}}
                            </td>
                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->phone}}
                            </td>
                            <td> {{$user->email}} </td>
                            <td>{{$user->created_at}}</td>
                            <td>

                                <div class="template-demo">

                                    <a href="" class="btn btn-outline-secondary btn-icon-text"> Edit
                                    </a>
                                    <a href="" class="btn btn-outline-danger btn-icon-text">
                                        Delete</a>

                                </div>







                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>

                {{$user_info->links()}}
            </div>
        </div>
    </div>
</div>




@endsection