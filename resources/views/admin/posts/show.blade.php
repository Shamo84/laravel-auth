@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="post mb-4">

          <h2>{{$post->title}}</h2>
          <p>{{$post->content}}</p>
          <p>Author: {{$post->user->name}}</p>
          <p>Created at: {{$post->created_at}}</p>
          <p>Updated at: {{$post->updated_at}}</p>
          @foreach ($post->tags as $tag)
            <span class="btn btn-warning">{{$tag->name}} </span>
          @endforeach
          <form class="mt-5" action="{{route("admin.posts.destroy", compact("post"))}}" method="post">
            <a href="{{route("admin.posts.edit", compact("post"))}}" class="btn btn-primary btn-lg">EDIT</a>
            @method("DELETE")
            @csrf
            <input type="submit" class="btn btn-danger btn-lg" value="DELETE">
            <a class="btn btn-primary float-right" href="{{route("admin.posts.index")}}">BACK</a>
          </form>
          <h3 class="mt-5">Comments:</h3>
          <div class="row mt-4">
            @foreach ($comments as $comment)
              <div class="col-7 mx-auto">
                <div class="float-left">
                  <h4>{{$comment->name}}</h4>
                  <p>{{$comment->email}}</p>
                  <p>{{$comment->text}}</p>
                </div>
              </div>
              <div class="col-2 mx-auto">
                <form class="mb-4 float-right" action="{{route("admin.posts.destroy", compact("post"))}}" method="post">
                  @method("DELETE")
                  @csrf
                  <input type="submit" class="btn btn-danger btn-sm" value="DELETE">
                </form>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
