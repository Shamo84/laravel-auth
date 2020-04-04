<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;
use App\user;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 5; $i++) {
        $newPost = new Post;
        $newPost->user_id = User::inRandomOrder()->first()->id;
        $newPost->title = $faker->realText($maxNbChars = 20, $indexSize = 2);
        $newPost->content = $faker->realText($maxNbChars = 200, $indexSize = 2);
        $newPost->slug = Str::slug($newPost->title) . rand(1, 1000);
        $newPost->updated_at = Carbon::now();
        $newPost->save();
      }
    }
}
