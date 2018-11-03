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
                    <div class="box-body">
                        <!-- /.box -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Edit Admin Here</h3>
                            </div>
                            <!-- /.box-header -->
                        </div>
                        <!-- /.box -->
                        <form role="form" method="post" action="{{ route('user.update', $user->id ) }}">
                            @csrf
                            {{ method_field('PUT') }}

                        <div class="col-lg-6 col-lg-offset-3 ">
                            <div class="form-group">
                                <label for="name" class="{{ $errors->has('name') ? ' error' : '' }}">  {{ __('Name') }} </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="user name" value="{{ old('name')?old('name'):$user->name }}">
                                @if ($errors->has('name'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="{{ $errors->has('email') ? ' error' : '' }}">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email')?old('email'):$user->email }}" placeholder=" user email">
                                @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="{{ $errors->has('phone') ? ' error' : '' }}">{{ __('Phone') }}</label>
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone')?old('phone'):$user->phone }}" placeholder="user phone">
                                @if ($errors->has('phone'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="{{ $errors->has('role[]') ? ' error' : '' }}">Assign Role</label>
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <div class="col-md-4">
                                            <label>
                                                <input type="checkbox" value="{{ $role->id }}" name="role[]"
                                                @foreach($user->roles as $user_role)
                                                    @if($user_role->id == $role->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                >
                                                {{ $role->name }}
                                            </label>
                                        </div>

                                    </div>
                                @endforeach
                            </div><br /><br />

                            <div class="form-group">
                                <label class="{{ $errors->has('status') ? ' error' : '' }}">Status</label>
                                <div class="checkbox">
                                    <div class="col-md-12">
                                        <label>
                                            <input type="checkbox" value="1" name="status"
                                            @if($user->status == 1 || old('status')==1)
                                                checked
                                            @endif
                                            >
                                            Active
                                        </label>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div><br /><br />
                            <!-- /.box-body -->
                            <div class="form-group ">
                                <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
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