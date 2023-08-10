<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Matrial;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Unit::create(['name'=>'كيلو']);
        Unit::create(['name'=>'علبه']);
        Unit::create(['name'=>'كرتونه']);

        Matrial::create(['name'=>'طماطم','unit_id'=>'1','price'=>'15']);
        Matrial::create(['name'=>'سكر','unit_id'=>'3','price'=>'15']);
        Matrial::create(['name'=>'بيض','unit_id'=>'2','price'=>'15']);
        Matrial::create(['name'=>'شاي','unit_id'=>'1','price'=>'15']);
        Matrial::create(['name'=>'دقيق','unit_id'=>'3','price'=>'15']);
        Matrial::create(['name'=>'شيبسي','unit_id'=>'1','price'=>'15']);
        Matrial::create(['name'=>'طماطم','unit_id'=>'2','price'=>'15']);

        $this->call(AddonSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ItemSeeder::class);
    }
}
