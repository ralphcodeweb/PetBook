<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        foreach (range(1, 10) as $index) {
        	$tag = new Tag;
        	$tag->name = "tag $index";
        	$tag->save();
        }
    }
}
