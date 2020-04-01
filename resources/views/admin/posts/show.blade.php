@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="post">

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

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
