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
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
                <li class="active">Role</li>
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
                    <h3 class="box-title">Create Role Here</h3>
                    @can('role.create', Auth::User())
                    <a href="{{ route('role.create') }}" class="col-lg-offset-4 btn btn-primary">Add New Role</a>
                    @endcan

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Role </th>
                            <th>Created At</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>

                        @foreach($roles as $role)
                            <tbody>
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $role->name }}</td>
                               <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('role.edit', $role->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                <td class="text-center">

                                    <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy',$role->id) }}" method="post"  style="display: none">

                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if (confirm('Are you sure, You want to delete this?'))
                                            {
                                            event.preventDefault();document.getElementById('delete-form-{{ $role->id }}').submit()
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
                            <th>Role</th>
                            <th>Created At</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </tfoot>
                    </table>
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