<?php
use App\Category;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        foreach (range(1, 4) as $index) {
            $categoria = new Category;
            $categoria->name = "Categoria $index";
            $categoria->save();
        }
    }
}