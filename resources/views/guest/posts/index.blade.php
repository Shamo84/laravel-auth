@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Post</h1>
        @foreach ($posts as $post)
          <div class="post mb-4">
            <h2><a href="{{route("posts.show", $post->slug)}}">{{$post->title}}</a></h2>
            <p>{{$post->content}}</p>
            @foreach ($post->tags as $tag)
              <span class="badge badge-warning">{{$tag->name}} </span>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
