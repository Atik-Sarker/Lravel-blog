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
                        <form role="form" method="post" action="{{ route('tag.store') }}">
                            @csrf
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Create Tag Here</h3>
                                        <a href="{{ route('tag.index') }}" class="col-lg-offset-3 btn btn-primary">View All Tag</a>

                                    </div>
                                    <!-- /.box-header -->
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-offset-2 col-lg-8">
                                    <div class="form-group">
                                        <label for="tag" class="{{ $errors->has('tag') ? ' error' : '' }}">Tag Title</label>
                                        <input type="text" class="form-control" id="tag" name="tag" placeholder="write tag here" value="{{old('tag')}}">
                                        @if ($errors->has('tag'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_slug" class="{{ $errors->has('slug') ? ' error' : '' }}">Tag Slug</label>
                                        <input type="text" class="form-control" id="tag_slug" name="slug" placeholder="write tag slug here" value="{{old('slug')}}">
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