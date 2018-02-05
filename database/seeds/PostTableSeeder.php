<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création des catégories
        App\Category::create([
          'name' => 'incantation'
        ]);
        App\Category::create([
          'name' => 'démonologie'
        ]);
        App\Category::create([
          'name' => 'sacrifice'
        ]);
        App\Category::create([
          'name' => 'cartomancie'
        ]);

        //On supprime toutes les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allFiles());


        //Création de 50 post
        factory(App\Post::class, 50)->create()->each(function($post){
          //Association d'une categorie à un post_type
          $category = App\Category::find(rand(1,4));

          //Pour chaque post, on lui associe une categorie en particulier
          $post->category()->associate($category);
          $post->save(); //On sauvegarde pour faire persister en bdd

          //ajout des images
          //J'utilise UP sur lorempicsum pour récupérer des images aléatoires
          $link = str_random(12) . '.jpg';
          $file = file_get_contents('http://lorempicsum.com/up/350/200/' . rand(1,9));
          Storage::disk('local')->put($link, $file);

          $post->picture()->create([
            'title' => 'Default',
            'link' => $link
          ]);
        });

    }
}
