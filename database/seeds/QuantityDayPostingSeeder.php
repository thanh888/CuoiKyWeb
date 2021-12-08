<?php

use App\Models\QuantityDayPost;
use Illuminate\Database\Seeder;

class QuantityDayPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuantityDayPost::insert([
            'name'=> 7,
            'price'=> 500,
        ]);
        QuantityDayPost::insert([
            'name'=> 15,
            'price'=> 1000000,
        ]);
        QuantityDayPost::insert([
            'name'=> 30,
            'price'=> 1900000,
        ]);
        QuantityDayPost::insert([
            'name'=> 60,
            'price'=> 3500000,
        ]);
        QuantityDayPost::insert([
            'name'=> 90,
            'price'=> 50000000,
        ]);
    }
}
