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
        Need::create( [
            'name'=> 'Mua Bán'
        ]);
        Need::create( [
            'name'=> 'Cần Mua'
        ]);
        Need::create( [
            'name'=> 'Cho Thuê'
        ]);
        Need::create( [
            'name'=> 'Cần Thuê'
        ]);
        Need::create( [
            'name'=> 'Sang Nhượng'
        ]);
        Need::create( [
            'name'=> 'Mua Sang Nhượng'
        ]);
    }
}
