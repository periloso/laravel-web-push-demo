<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Post::class, 100)->create()
//            ->each(function ($post) {
//                $post->user()->save(
//                    factory(User::class)->make()
//                );
//            });
//
//        factory(Post::class, 'unpublished', 10)->create()
//            ->each(function ($post) {
//                $post->user()->save(
//                    factory(User::class)->make()
//                );
//            });

        User::create([
            'name' => 'Alessio',
            'surname' => 'Periloso',
            'password' => 'secret',
            'email' => 'mail@periloso.com',
        ]);

    }
}
