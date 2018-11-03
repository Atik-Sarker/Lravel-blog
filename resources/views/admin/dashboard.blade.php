@extends('admin.include.main_dashboard')
@section('admin_content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Welcome
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">

                    <div class="box-tools pull-right">


                    </div>
                </div>
                <div class="box-body">
                    Start creating your amazing application!
                </div>
                <div class="box-footer">
                    {{--Footer--}}
                </div>
            </div>
        </section>
    </div>
@endsection