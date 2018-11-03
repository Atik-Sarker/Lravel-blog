@extends('admin.include.main_dashboard')
@section('headSection')
    <link rel="stylesheet" href="{{asset('backEnd/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="box-title">All Post Here</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Post</li>
                <li class="active">Show</li>
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
                    @can('post.create', Auth::User())
                        <a href="{{ route('admin.dashboard') }}" class="col-lg-offset-5 btn btn-warning">Back</a>
                        <a href="{{ route('post.create') }}" class=" btn btn-primary">Add New Post</a>
                    @endcan
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        @foreach($posts as $post)
                            <tbody>
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td width="300px">{{ $post->title }}</td>
                                <td width="250px">{{ $post->subtitle }}</td>
                                <td width="100px">{{ $post->slug }}</td>
                                <td width="100px">{{ $post->created_at->diffForHumans() }}</td>
                                <td width="100px">{{ $post->posted_by }}</td>
                                <td>{{ $post->status? 'Active' : 'Unpublished' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('post.show', $post->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    @can('post.update', Auth::User())|
                                    <a href="{{ route('post.edit', $post->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                                    @endcan
                                    @can('post.delete', Auth::User())|
                                    <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy',$post->id) }}" method="post"  style="display: none">

                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                    if (confirm('Are you sure, You want to delete this?'))
                                    {
                                    event.preventDefault();document.getElementById('delete-form-{{ $post->id }}').submit()
                                    }
                                    else
                                    {
                                    event.preventDefault();
                                    }
                                    "><span class="glyphicon glyphicon-trash"></span></a>
                                    @endcan
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                    <span class="pull-right">
                    {{ $posts->links() }}
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