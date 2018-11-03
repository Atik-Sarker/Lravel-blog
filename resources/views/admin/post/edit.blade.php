@extends('admin.include.main_dashboard')

{{--===== css file for select item=====--}}
@section('headSection')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

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
                        <form role="form" method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <!-- /.box -->
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title{{ $errors->has('postbody') ? ' error' : '' }}">Create Post Here</h3>
                                        <a href="{{ route('post.index') }}" class="col-lg-offset-4 btn btn-warning">Back</a>
                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body pad">
                                        @if ($errors->has('postbody'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('postbody') }}</strong>
                                    </span>
                                        @endif
                                    <textarea id="editor1" rows="10" cols="80" name="postbody" placeholder="Place some text here"
                                              style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {!! File::get(storage_path("app/public/postBody/{$post->id}.txt")) !!}
                                    </textarea>
                                    </div>
                                </div>
                                <!-- /.box -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title" class="{{ $errors->has('title') ? ' error' : '' }}">Post Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="write title here" value="{{ $post->title }}">
                                        @if ($errors->has('title'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="{{ $errors->has('subtitle') ? ' error' : '' }}">Post Subtitle</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="write subtitle here" value="{{ $post->subtitle }}">
                                        @if ($errors->has('subtitle'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('subtitle') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="{{ $errors->has('slug') ? ' error' : '' }}">Post Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="write slug here" value="{{ $post->slug }}">
                                        @if ($errors->has('slug'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="{{ $errors->has('categories') ? ' error' : '' }}">Select Category</label>
                                        <select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="select a category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"

                                                        @foreach($post->categories as $postCategory)
                                                            @if($postCategory->id == $category->id)
                                                            selected
                                                            @endif
                                                        @endforeach

                                                >{{ $category->name   }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('categories'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('categories') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="{{ $errors->has('tags') ? ' error' : '' }}">Select Tag</label>
                                        <select name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Subcategory" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}"

                                                @foreach($post->tags as $postTag)
                                                    @if($postTag->id == $tag->id)
                                                        selected
                                                    @endif
                                                @endforeach

                                                >{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tags'))
                                            <span class="error" role="alert">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    <div class="form-group d-block">
                                        <div class="pull-left">
                                            <label for="exampleInputFile">Update Image</label>
                                            <input type="file" name="image" id="exampleInputFile">
                                            <img src='{{ asset("storage/postImage/{$post->id}.{$post->image}")}}' height="100">

                                        </div>
                                        <div class="pull-left">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="publicationstatus" @if($post->status == true) checked @endif> Publish
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer ">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{--===== js file for select item=====--}}
@section('footerSection')
    <script src="{{ asset('backEnd/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('backEnd/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
       $(document).ready(function(){
           $('.select2').select2();
       })



    </script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection