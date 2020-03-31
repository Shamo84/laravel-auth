@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form class="" action="{{route("admin.posts.update", compact("post"))}}" method="post">
          @method("PATCH")
          @csrf
          <div class="form-group">
            <label for="title">TITLE</label>
            <input class="form-control" type="text" name="title" value="{{$post->title}}" placeholder="">
            <label for="content">TEXT</label>
            <textarea class="form-control" name="content" rows="8" cols="80">{{$post->content}}</textarea>
          </div>
          <button class="form-control btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
