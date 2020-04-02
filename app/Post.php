<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    "user_id",
    "title",
    "content",
    "slug",
    "updated_at",
    "image_path"
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  public function comments() {
    return $this->hasMany("App\Comment");
  }
}
