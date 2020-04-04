<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 10; $i++) {
        $newComment = new Comment;
        $newComment->name = $faker->name;
        $newComment->email = Str::slug($newComment->name, '.') . "@gmail.com";
        $newComment->text = $faker->realText(200);
        $newComment->post_id = Post::inRandomOrder()->first()->id;
        $newComment->save();
      }
    }
}
