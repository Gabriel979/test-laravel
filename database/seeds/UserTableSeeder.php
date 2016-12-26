<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seeder

        DB::table('users')->insert(['name'=>'Pepe Argento', 'email'=>'gabrielsanchez.frh@gmail.com', 'password'=>bcrypt('789789')]);
    }
}
