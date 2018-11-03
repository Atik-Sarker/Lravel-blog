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
                        <form role="form" method="post" action="{{ route('permission.update', $permission->id) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Create Permission Here</h3>

                                    </div>
                                    <!-- /.box-header -->
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-offset-2 col-lg-8">
                                    <div class="form-group">
                                        <label for="permission" class="{{ $errors->has('name') ? ' error' : '' }}">Permission</label>
                                        <input type="text" class="form-control" id="permission" name="name" placeholder="write permission here" value="{{ $permission->name }}">
                                        @if ($errors->has('name'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="select_permission"> Select Permission For</label>
                                        <select name="for" id="select_permission" class="form-control    ">
                                            <option disabled selected>Select Permission For</option>
                                            <option value="Post">Post</option>
                                            <option value="User">User</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <!-- /.box-body -->
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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