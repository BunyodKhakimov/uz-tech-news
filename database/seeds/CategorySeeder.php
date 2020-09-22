<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'administartion'
        ]);

        Category::create([
            'name' => 'economy'
        ]);

        Category::create([
            'name' => 'manufactoring'
        ]);

        Category::create([
            'name' => 'shipping'
        ]);
    }
}
