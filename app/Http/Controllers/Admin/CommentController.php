<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function destroy(Comment $comment)
  {
    $postSlug = Post::where("id", $comment->post_id)->first()->slug;
    $comment->delete();
    return redirect()->back();
  }
}
