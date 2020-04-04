@extends('layouts.app')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-4">
            <img class="img-fluid" src="{{asset('storage/' . $post->image_path)}}" alt="">
          </div>
        </div>
        <form class="" action="{{route("admin.posts.update", compact("post"))}}" method="post" enctype="multipart/form-data">
          @method("PATCH")
          @csrf
          <div class="form-group">
            @if (!empty($post->image_path))
              <label for="img-del">delete image</label>
              <input type="checkbox" name="img-del" value="true"><br>
            @endif
            <label for="title">TITLE</label>
            <input class="form-control" type="text" name="title" value="{{$post->title}}" placeholder="">
            <label for="content">TEXT</label>
            <textarea class="form-control mb-3" name="content" rows="8" cols="80">{{$post->content}}</textarea>
            @foreach ($tags as $tag)
              <input class="ml-2" type="checkbox" name="tags[]" value="{{$tag->id}}" {{($post->tags->contains($tag->id)) ? "checked" : "" }}>
              <label for="">{{$tag->name}}</label>
            @endforeach
          </div>
          <input type="file" name="image_path" accept="image/*" src="">
          <button class="mt-4 form-control btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
