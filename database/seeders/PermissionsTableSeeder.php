<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Edit']);
         Permission::create(['name' => 'Add']);
         Permission::create(['name' => 'Delete']);
         Permission::create(['name' => 'Show']);
    }
}
