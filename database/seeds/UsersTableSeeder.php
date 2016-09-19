<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first' => 'Randy',
            'last' => 'Binondo',
            'email' => 'randy@crowdmetric.com',
            'role' => 'admin',
            'password' => bcrypt('test123'),
        ]);

        factory(App\Models\User::class, 50)->create()->each(function($u) {

        });
    }
}
