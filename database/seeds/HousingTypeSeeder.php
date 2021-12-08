<?php

use App\Models\HousingType;
use Illuminate\Database\Seeder;

class HousingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HousingType::insert([
            'name'=> 'Nhà ở',
        ]);
        HousingType::insert([
            'name'=> 'Nhà cấp 4',
        ]);
        HousingType::insert([
            'name'=> 'Đất - Đất nền - Nhà như đất',
        ]);
        HousingType::insert([
            'name'=> 'Biệt thự - Song lập - Đơn lập',
        ]);
        HousingType::insert([
            'name'=> ' Chung cư',
        ]);
        HousingType::insert([
            'name'=> 'Chung cư mini',
        ]);
        HousingType::insert([
            'name'=> 'Căn hộ cho thuê',
        ]);
        HousingType::insert([
            'name'=> 'Căn hộ du lịch - Condotel',
        ]);
        HousingType::insert([
            'name'=> 'Biệt thự du lịch, văn phòng - Officetel',
        ]);
        HousingType::insert([
            'name'=> 'Mặt bằng thương mại',
        ]);
        HousingType::insert([
            'name'=> 'Bất động sản khác',
        ]);
    }
}
