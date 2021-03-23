<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
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
        // CICLO PER CREARE 5 POST CON DATI FAKER 
        for ($i = 0; $i < 5; $i++){

            $posizione = 1;

            $userCount = count(User::all()->toArray());

            $newPost = new Post();

            $newPost->user_id = rand(1,$userCount);

            $newPost->name = $faker->sentence();

            $newPost->description = $faker->text();

            $slug = Str::slug($newPost->name);
            
            $slugInit = $slug;

            $postRecent = Post::where('slug',$slug)->first();

            while($postRecent){
                $slug = $slugInit . '-' . $posizione;
                $postRecent = Post::where('slug',$slug)->first();
                $posizione++;
            }

            $newPost->slug = $slug;

            $newPost->save();
        }
    }
}
