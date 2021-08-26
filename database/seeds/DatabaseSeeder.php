<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        App\User::create([
            'name' => 'Brayan Moya',
            'email' => 'bmoya17hotmail.com',
            'password' => bcrypt('betamaster1')
        ]);

        factory(App\Post::class, 24)->create();
    }
}
