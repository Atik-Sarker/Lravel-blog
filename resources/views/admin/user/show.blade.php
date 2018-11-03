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
                Create User Here
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
        @endif
            {{--{{route('user.create')}}--}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <a class="col-lg-offset-5 btn btn-primary" href="{{ route('user.create') }}">Add New User</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        @foreach($users as $user)
                            <tbody>
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>{{ $user->status ? 'Active' : 'Deactivate' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.show', $user->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    |
                                    <a href="{{ route('user.edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                    |
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="post"  style="display: none">

                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if (confirm('Are you sure, You want to delete this?'))
                                            {
                                            event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit()
                                            }
                                            else
                                            {
                                            event.preventDefault();
                                            }
                                            "><span class="glyphicon glyphicon-trash"></span></a>

                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Tag name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    <span class="pull-right">
                    {{ $users->links() }}
                    </span>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{--Footer--}}
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