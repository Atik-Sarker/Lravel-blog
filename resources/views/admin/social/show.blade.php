@extends('admin.include.main_dashboard')
@section('headSection')
    <link rel="stylesheet" href="{{asset('backEnd/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('admin_content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Social Links Here
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Social</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
        @endif
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <div class="col-lg-10 col-lg-offset-1">
                    <table  id="example1" class="table table-bordered table-striped table-hover">
                        @foreach($links as $social)
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Twitter</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $social->email }}</td>
                            <td>{{ $social->phone }}</td>
                            <td>{{ $social->twitter }}</td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th>Facebook</th>
                            <th>Youtube</th>
                            <th>Google</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $social->facebook }}</td>
                            <td>{{ $social->youtube }}</td>
                            <td>{{ $social->google }}</td>
                        </tr>
                        </tbody>
                            <thead>
                            <tr>
                                <th>LinkedIn</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $social->linkedin }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>

                        @endforeach
                    </table>
                        <a class="col-lg-offset-5 btn btn-warning" href="{{route('admin.dashboard')}}">Back</a>
                        <a class=" btn btn-primary" href="{{ route('social.edit',$social->id) }}">Add New</a>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('footerSection')
    <!-- DataTables -->
    <script src="{{asset('backEnd/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backEnd/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>

    </script>
@endsection