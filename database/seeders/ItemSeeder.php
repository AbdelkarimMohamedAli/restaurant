<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Factory::create();
        $variant=[['name'=>'size',
                'array'=>[['name'=>'L','price'=>'10'],['name'=>'M','price'=>'5'],['name'=>'S','price'=>'0']],
                ],['name'=>'type',
                  'array'=>[['name'=>'SOS','price'=>'0'],['name'=>'NOR','price'=>'0']],
                ]
                ];
        $addons=[['name'=>'sokar','price'=>'5'],['name'=>'shay','price'=>'5']];
        $matrials=[['name'=>'sokar','price'=>'5'],['name'=>'shay','price'=>'5']];
        Item::create([
            'name'=>$faker->sentence(4),
            'category_id' => Category::inRandomOrder()->first()->id,
            'img'=> 'product-1.jpg',
            'discount'=>'0',
            'discount_type'=>'offer',
            'addons'=>$addons,
            'variant'=>$variant,
            'matrials'=>$matrials,
            'price'=>'35',
            'user_id'=>'1',
            'description'=>$faker->paragraph(3,true),
        ]);
    }
}
