<?php

namespace Database\Seeders;

use App\Models\Addon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Addon::create(['name'=>'كنز','price'=>'10']);
        Addon::create(['name'=>'سلطه','price'=>'10']);
        Addon::create(['name'=>'شاي','price'=>'8']);
        Addon::create(['name'=>'عصير','price'=>'15']);
        Addon::create(['name'=>'عيش','price'=>'5']);
    }
}
