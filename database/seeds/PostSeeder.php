<?php

use Illuminate\Database\Seeder;

use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Title 1',
            'subtitle' => 'Subtitle 1',
            'category' => 'Category 1',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum commodi rem reprehenderit odio reiciendis ut fugit voluptate maxime, doloremque quasi.',
            'hidden' => false
        ]);

        Post::create([
        	'title' => 'Title 2',
            'subtitle' => 'Subtitle 2',
            'category' => 'Category 2',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum commodi rem reprehenderit odio reiciendis ut fugit voluptate maxime, doloremque quasi.',
            'hidden' => false
        ]);

        DB::table('posts')->insert([
            'title' => 'Title 3',
            'subtitle' => 'Subtitle 3',
            'category' => 'Category 3',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum commodi rem reprehenderit odio reiciendis ut fugit voluptate maxime, doloremque quasi.',
            'hidden' => false
        ]);

        Post::create([
        	'title' => 'Title 4',
            'subtitle' => 'Subtitle 4',
            'category' => 'Category 4',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum commodi rem reprehenderit odio reiciendis ut fugit voluptate maxime, doloremque quasi.',
            'hidden' => false
        ]);
    }
}
