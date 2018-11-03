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
                All Category

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Category</li>
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
                        <div class="box-header">
                            <a class="col-lg-offset-5 btn btn-warning" href="{{route('admin.dashboard')}}">Back</a>
                            <a class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Category name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                @foreach($categories as $category)
                                <tbody>
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('category.show', $category->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        |
                                        <a href="{{ route('category.edit', $category->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                        |
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="post"  style="display: none">

                                            @csrf
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                                                if (confirm('Are you sure, You want to delete this?'))
                                                {
                                                event.preventDefault();document.getElementById('delete-form-{{ $category->id }}').submit()
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
                                    <th>Category name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                            <span class="pull-right">{{ $categories->links() }}</span>
                        </div>
                        <!-- /.box-body -->
                </div>
                <div class="box-body">

                </div>



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