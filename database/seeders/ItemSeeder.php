<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Factory::create();
        $variant='[{size:[{size:"L",price:10},{size:"L",price:10}]},{type:["spycy","normal"]}]';
        Item::create([
            'name'=>$faker->sentence(4),
            'category_id' => Category::inRandomOrder()->first()->id,
            'img'=> 'product-1.jpg',
            'discount'=>'0',
            'discount_type'=>'offer',
            'addons'=>json_encode('[{name:"kans",price:10},{name:"salat",price:10}]'),
            'variant'=>json_encode($variant),
            'price'=>'35',
            'user_id'=>'1',
            'description'=>$faker->paragraph(),
        ]);
    }
}
