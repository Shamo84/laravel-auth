@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="{{route("admin.posts.create")}}" class="btn btn-primary form-control mb-3">NEW POST</a>
        @foreach ($posts as $post)
          <div class="post mb-4">
            <h2><a href="{{route("admin.posts.show", $post->slug)}}">{{$post->title}}</a><small> - {{$post->user->name}}</small> </h2>
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
