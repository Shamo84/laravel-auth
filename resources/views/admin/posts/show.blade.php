@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="post mb-4">
            <div class="row mb-5">
              <div class="col-6">
                <img class="img-fluid" src="{{asset('storage/' . $post->image_path)}}" alt="">
              </div>
            </div>
          <h2>{{$post->title}}</h2>
          <p>{{$post->content}}</p>
          <p>Author: {{$post->user->name}}</p>
          <p>Created at: {{$post->created_at}}</p>
          <p>Updated at: {{$post->updated_at}}</p>
          @foreach ($post->tags as $tag)
            <span class="btn btn-warning">{{$tag->name}} </span>
          @endforeach
          @if ($post->user_id == Auth::id())
            <form class="mt-5" action="{{route("admin.posts.destroy", compact("post"))}}" method="post">
              <a href="{{route("admin.posts.edit", compact("post"))}}" class="btn btn-primary btn-lg">EDIT</a>
              @method("DELETE")
              @csrf
              <input type="submit" class="btn btn-danger btn-lg" value="DELETE">
            </form>
          @endif
          <a class="btn btn-primary float-right" href="{{route("admin.posts.index")}}">BACK</a>
          <h3 class="mt-5">Comments:</h3>
          <div class="row mt-4">
            @foreach ($comments as $comment)
              <div class="col-8 mx-auto mt-3 card-body">
                <div class="float-left">
                  <h4 class="card-header">{{$comment->name}}</h4>
                  <p>{{$comment->email}}</p>
                  <p>{{$comment->text}}</p>
                  <small>{{$comment->created_at}}</small>
                </div>
              </div>
              <div class="col-1 mx-auto">
              @if ($post->user_id == Auth::id())
                  <form class="float-right" action="{{route("admin.comments.destroy", compact("comment"))}}" method="post">
                    @method("DELETE")
                    @csrf
                    <input type="submit" class="mt-5 btn btn-danger btn-sm" value="DELETE">
                  </form>
              @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
