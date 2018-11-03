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
                        <form role="form" method="post" action="{{ route('social.store') }}">
                            @csrf
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Create Social Links Here</h3>
                                        <a href="" class="col-lg-offset-3 btn btn-primary">View All Tag</a>

                                    </div>
                                    <!-- /.box-header -->
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-offset-2 col-lg-8">
                                    <div class="form-group">
                                        <label for="email" class="{{ $errors->has('email') ? ' error' : '' }}">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="{{ $errors->has('phone') ? ' error' : '' }}">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{old('phone')}}">
                                        @if ($errors->has('phone'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook" class="{{ $errors->has('facebook') ? ' error' : '' }}">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Link" value="{{old('facebook')}}">
                                        @if ($errors->has('facebook'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_youtube" class="{{ $errors->has('youtube') ? ' error' : '' }}">Youtube</label>
                                        <input type="text" class="form-control" id="tag_youtube" name="youtube" placeholder="Youtube Link" value="{{old('youtube')}}">
                                        @if ($errors->has('youtube'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="google" class="{{ $errors->has('google') ? ' error' : '' }}">Google Plus</label>
                                        <input type="text" class="form-control" id="google" name="google" placeholder="Google Plus Link" value="{{old('google')}}">
                                        @if ($errors->has('google'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('google') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter" class="{{ $errors->has('twitter') ? ' error' : '' }}">twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter Link" value="{{old('twitter')}}">
                                        @if ($errors->has('twitter'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin" class="{{ $errors->has('linkedin') ? ' error' : '' }}">LinkedIn</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="linkedin" value="{{old('linkedin')}}">
                                        @if ($errors->has('linkedin'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('linkedin') }}</strong>
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