<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name'      =>'karim',
            'email'     =>'karim@gmail.com',
            'password'  =>bcrypt('12345678'),
            'image'     => 'users/03.jpg'
        ])->assignRole(['admin','cooker']);
        User::create([
            'name'      =>'abdallah',
            'email'     =>'admin@gmail.com',
            'password'  =>bcrypt('12345678'),
            'image'     => 'users/02.jpg'
        ])->assignRole(['admin','cooker']);

        $faker = Factory::create();

       for ($i =1; $i <= 2; $i++) {
        User::create([
            'name' => $faker->name,
            'email'     => $faker->unique()->safeEmail,
            'password'  => bcrypt('12345678'),
            'image'     => 'users/'.sprintf("%02d", $i).'.jpg'
           ]);
       }
    }
}
