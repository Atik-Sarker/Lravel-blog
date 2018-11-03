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
                        <form role="form" method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Create Banner and Logo</h3>
                                        <a href="" class="col-lg-offset-3 btn btn-primary">View All</a>

                                    </div>
                                    <!-- /.box-header -->
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-offset-2 col-lg-8">
                                    <div class="form-group">
                                        <label for="logo" class="{{ $errors->has('logo') ? ' error' : '' }}">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo" value="{{old('logo')}}">
                                        @if ($errors->has('logo'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="headerBanner" class="{{ $errors->has('headerBanner') ? ' error' : '' }}">Header Banner</label>
                                        <input type="file" class="form-control" id="headerBanner" name="headerBanner"  value="{{old('headerBanner')}}">
                                        @if ($errors->has('headerBanner'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('headerBanner') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="sidebarBanner" class="{{ $errors->has('sidebarBanner') ? ' error' : '' }}">Sidebar Banner</label>
                                        <input type="file" class="form-control" id="sidebarBanner" name="sidebarBanner"  value="{{old('sidebarBanner')}}">
                                        @if ($errors->has('sidebarBanner'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('sidebarBanner') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="footerBanner" class="{{ $errors->has('footerBanner') ? ' error' : '' }}">Footer Banner</label>
                                        <input type="file" class="form-control" id="footerBanner" name="footerBanner"  value="{{old('footerBanner')}}">
                                        @if ($errors->has('footerBanner'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('footerBanner') }}</strong>
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