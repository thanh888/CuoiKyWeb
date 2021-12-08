<?php

use App\Models\Need;
use Illuminate\Database\Seeder;

class NeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Need::insert( [
            'name'=> 'Cần Bán'
        ]);
        Need::insert( [
            'name'=> 'Cần Mua'
        ]);
        Need::insert( [
            'name'=> 'Cho Thuê'
        ]);
        Need::insert( [
            'name'=> 'Cần Thuê'
        ]);
        Need::insert( [
            'name'=> 'Sang Nhượng'
        ]);
        Need::insert( [
            'name'=> 'Mua Sang Nhượng'
        ]);
    }
}
