<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::where("user_id", Auth::id())->get();
      return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::all();
      return view("admin.posts.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $newPost = new Post;
      $newPost->fill($data);
      $newPost->user_id = Auth::id();
      $newPost->slug = str::slug($newPost->title) . rand(1, 1000);
      $saved = $newPost->save();
      if (!$saved) {
        return redirect()->back()->withInput();
      }
      if (isset($data["tags"])) {
        $tags = $data["tags"];
        $newPost->tags()->attach($tags);
      }
      return redirect()->route("admin.posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $post = Post::where("slug", $slug)->first();
      $comments = Comment::where("post_id", $post->id)->get();

      $data = [
        "post" => $post,
        "comments" => $comments
      ];

      return view("admin.posts.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $tags = Tag::all();
      $data = [
        "post" => $post,
        "tags" => $tags
      ];
      return view("admin.posts.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $data = $request->all();
      $post->fill($data);
      $updated = $post->update();
      $tags = [];
      if (isset($data["tags"])) {
        $tags = $data["tags"];
      }
      $post->tags()->sync($tags);
      if (!$updated) {
        return redirect()->back()->withInput();
      }
      return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();
      return redirect()->route("admin.posts.index");
    }
}
