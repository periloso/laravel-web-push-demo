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
        User::create([
            'name' => 'Alessio',
            'surname' => 'Periloso',
            'password' => 'secret',
            'email' => 'mail@periloso.com',
        ]);
    }
}
