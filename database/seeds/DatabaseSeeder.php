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
        // $this->call(UserSeeder::class);

        // Makes 50 users, 1 post per user:
        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     $user->posts()->save(factory(App\Post::class)->make());
        // });

        // makes 50 users & 5 posts per user:
        factory(App\User::class, 50)
            ->create()
            ->each(function ($user) {
                $user->posts()
                    ->createMany(factory(App\Post::class, 5)
                            ->make()->toArray());
            });
    }
}
