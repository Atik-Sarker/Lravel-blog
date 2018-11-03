@extends('admin.include.main_dashboard')

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                            @if (session('status'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        <!-- form start -->
                        <form role="form" action="{{ route('category.update', $category->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Create Category Here</h3>
                                        <a href="{{ route('category.index') }}" class="col-lg-offset-2 btn btn-primary">View All Category</a>

                                    </div>
                                    <!-- /.box-header -->
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-offset-2 col-lg-8">
                                    <div class="form-group">
                                        <label for="category" class="{{ $errors->has('category') ? ' error' : '' }}">Category Title</label>
                                        <input type="text" class="form-control" id="category" name="category" placeholder="write category here" value="{{$category->name}}">
                                         @if ($errors->has('category'))
                                                <span class="error" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="slug" class="{{ $errors->has('slug') ? ' error' : '' }}">Category Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="write category here" value="{{$category->slug}}">
                                        @if ($errors->has('slug'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection