<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 4; $i++) {
        $newPost = new Post;
        $newPost->user_id = 1;
        $newPost->title = $faker->realText($maxNbChars = 20, $indexSize = 2);
        $newPost->content = $faker->realText($maxNbChars = 200, $indexSize = 2);
        $newPost->slug = Str::slug($newPost->title) . rand(1, 1000);
        $newPost->updated_at = Carbon::now();
        $newPost->save();
      }
    }
}
