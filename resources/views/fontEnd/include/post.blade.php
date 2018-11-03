@extends('muster')


@section('main-content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <img src='{{ asset("storage/postImage/{$post->id}.{$post->image}")}}' height="400">
                    {!! File::get(storage_path("app/public/postBody/{$post->id}.txt")) !!}

                    <small style="float: left">Created At {{ $post->created_at->diffForHumans() }}</small>
                    <small style="float: right; margin-left: 5px">Category:

                    @foreach($post->categories as $category)
                            <a href="{{ url('/category/post', $category->id) }}">
                        {{ $category->name}}
                            </a>
                    @endforeach

                    </small>

                    <div class="fb-comments mx-0" data-href="{{ Request::url() }}" data-numposts="5"></div>

                    <h5>Tags</h5>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag',$tag->id) }}">
                            <small style="margin-left: 5px; border: 1px solid   grey; padding: 1px  5px; font-size: 14px" >
                                {{ $tag->name}}
                            </small>
                        </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </article>


@endsection

@section('bg-img', asset("storage/postImage/{$post->id}.{$post->image}"))
{{--@section('bg-img', Storage::disk('local')->url($post->image))--}}

@section('heading',$post->title)

@section('sub_heading', $post->subtitle)