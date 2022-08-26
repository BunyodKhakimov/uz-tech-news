<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(
            [
                'name' => 'new'
            ]
        );

        Tag::create(
            [
                'name' => 'barnd'
            ]
        );

        Tag::create(
            [
                'name' => 'warning'
            ]
        );

        Tag::create(
            [
                'name' => 'urgent'
            ]
        );
    }
}
