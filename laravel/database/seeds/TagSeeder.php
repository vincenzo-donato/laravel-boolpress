<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // CICLO 3 VOLTE PER CREARE DATI TAG FAKER 
        for ($i = 0; $i < 3; $i++){

            $posizione = 1;

            $newTag = new Tag();

            $newTag->name = $faker->sentence(3,true);

            $slug = Str::slug($newTag->name);

            $slugInit = $slug;

            $postRecent = Tag::where('slug',$slug)->first();

            while($postRecent){
                $slug = $slugInit . '-' . $posizione;
                $postRecent = Tag::where('slug',$slug)->first();
                $posizione++;
            }

            $newTag->slug = $slug;

            $newTag->save();
        }
    }
}
