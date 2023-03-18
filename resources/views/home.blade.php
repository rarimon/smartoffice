@extends('layouts.master')

@section('d_title')
Smart-Office|Home

@endsection

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
                <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('dashboard_asset')}}/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome To Dashboard</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">My office is smart !</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection