<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(rand(2, 3))->create()->each( function (User $user) {
           Article::factory(rand(10, 15))->create([
              'user_id' => rand(1, $user->pluck('id')->count())
           ])->each( function (Article $article) {
               $article->tags()->saveMany(Tag::all())->make();
           });
        });
    }
}
