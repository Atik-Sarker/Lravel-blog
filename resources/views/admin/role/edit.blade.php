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
                        <form role="form" method="post" action="{{ route('role.update', $role->id) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Create role Here</h3>
                                        <a href="{{ route('role.index') }}" class="col-lg-offset-3 btn btn-primary">View All role</a>

                                    </div>
                                    <!-- /.box-header -->
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-offset-2 col-lg-8">
                                    <div class="form-group">
                                        <label for="role" class="{{ $errors->has('name') ? ' error' : '' }}">Role Title</label>
                                        <input type="text" class="form-control" id="role" name="name" placeholder="write role here" value="{{$role->name}}">
                                        @if ($errors->has('name'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="role">Posts Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'Post')
                                                    <div class="checkbox">
                                                        <label for="post_permission{{$loop->index +1}}">
                                                            <input type="checkbox" name="permission[]" id="post_permission{{$loop->index +1}}" value="{{ $permission->id }}"

                                                               @foreach($role->permissions as $role_permit)
                                                                   @if($role_permit->id == $permission->id)
                                                                   checked
                                                                    @endif
                                                                @endforeach
                                                            >
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="role">User Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'User')
                                                    <div class="checkbox">
                                                        <label for="user_permission{{$loop->index +1}}">
                                                            <input type="checkbox" name="permission[]" id="user_permission{{$loop->index +1}}" value="{{ $permission->id }}"
                                                                   @foreach($role->permissions as $role_permit)
                                                                   @if($role_permit->id == $permission->id)
                                                                   checked
                                                                    @endif
                                                                    @endforeach
                                                            >
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="role">Other Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'Other')
                                                    <div class="checkbox">
                                                        <label for="other_permission{{$loop->index +1}}">
                                                            <input type="checkbox" name="permission[]" id="other_permission{{$loop->index +1}}" value="{{ $permission->id }}"
                                                                   @foreach($role->permissions as $role_permit)
                                                                   @if($role_permit->id == $permission->id)
                                                                   checked
                                                                    @endif
                                                                    @endforeach
                                                            >
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary">Update</button>
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