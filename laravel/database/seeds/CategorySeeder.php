<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; ++$i) {
            $category = new Category();

            $category->fill([
                'name' => 'category ' . $i,
            ]);

            $category->save();
        }
    }
}
