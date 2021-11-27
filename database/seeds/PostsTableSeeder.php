<?php
use App\Post;
use App\Tag;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borro las tabla
        Post::truncate();

        //Insert
        foreach (range(1, 4) as $index) {
            $post = new Post;
            $post->title = "Titulo $index";
            $post->slug = str_slug("Titulo $index");
            $post->excerpt = "Prueba Dialogo $index";
            $post->body = "Prueba de texto $index";
            $post->published_at = Carbon::now()->subDays($index);
            $post->category_id = $index;
            $post->save();

            $post->tags()->attach(Tag::create(['name' => "tag $index"]));
        }
    }
}
