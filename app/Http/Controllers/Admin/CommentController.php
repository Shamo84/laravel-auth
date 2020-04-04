<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $validationRules;

    public function __construct()
    {
      $this->validationRules = [
        "name" => "required|string|max:60",
        "email" => "required|email|max:60",
        "text" => "required|string|max:255"
      ];
    }
  public function destroy(Comment $comment)
  {
    $comment->delete();
    return redirect()->back();
  }
}
