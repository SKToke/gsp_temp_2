<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            INSERT INTO `zones` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
            array(1, 'Dhaka', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(2, 'Chattogram', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(3, 'Rajshahi', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(4, 'Khulna', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(5, 'Kushtia', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(6, 'Rangpur', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(7, 'HSC', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(8, 'Barishal', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(9, 'Mymensingh', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(10, 'Sylhet', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(11, 'Cumilla', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(12, 'Nursing', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(13, 'Advance Studies', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
            array(14, 'Ph.D.', NULL, '2023-06-30 08:01:21', '2023-06-30 08:01:21'),
        ];
        foreach ($data as $item) {
            Zone::create([
                'id' => $item[0],
                'name' => $item[1]
            ]);
        }
    }
}
