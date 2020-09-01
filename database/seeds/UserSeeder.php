<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bunyod',
            'email' => 'b.khakimov@student.inha.uz',
            'password' => bcrypt('password')
        ]);
    }
}
