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
                <li class="active">Permission</li>
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
                    <h3 class="box-title">User Permission</h3>
                    <a class="col-lg-offset-3 btn btn-primary" href="{{route('permission.create')}}">Add New</a>

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
                            <th>User Role</th>
                            <th>For</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        @foreach($permissions as $permission)
                            <tbody>
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->for }}</td>
                               <td>{{ $permission->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('permission.show', $permission->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    |
                                    <a href="{{ route('permission.edit', $permission->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                    |
                                    <form id="delete-form-{{ $permission->id }}" action="{{ route('permission.destroy',$permission->id) }}" method="post"  style="display: none">

                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                            if (confirm('Are you sure, You want to delete this?'))
                                            {
                                            event.preventDefault();document.getElementById('delete-form-{{ $permission->id }}').submit()
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
                            <th>Permission</th>
                            <th>For</th>
                            <th>Created At</th>
                            <th>Action</th>
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
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection