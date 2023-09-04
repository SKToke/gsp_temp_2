<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            INSERT INTO `batches` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
            array(1, 'Dhaka 10th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(2, 'Dhaka 12th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(3, 'Barishal 6th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(4, 'Chattogram 12th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(5, 'Rangpur 7th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(6, 'Kushtia 4th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(7, 'Rajshahi 8th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(8, 'Khulna 6th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(9, 'Cumilla 5th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(10, 'Mymensingh 6ht Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(11, 'Sylhet 6th Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(12, 'Dhaka 11th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(13, 'Chattogram 11th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(14, 'Chattogram 10th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(15, 'Rajshahi 7th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(16, 'Rajshahi 6th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(17, 'Khulna 4th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(18, 'Khulna 5th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(19, 'Kushtia 3rd Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(20, 'Kushtia 2nd Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(21, 'Rangpur 5th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(22, 'Rangpur 6th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(23, 'HSC 2nd Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(24, 'HSC 1st Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(25, 'Barishal 4th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(26, 'Barishal 5th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(27, 'Mymensingh 4th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(28, 'Mymensingh 5th  Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(29, 'Sylhet 4th Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(30, 'Sylhet 5th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(31, 'Cumilla 4th Batch 2020', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(32, 'Cumilla 3rd Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(33, 'Nursing 2nd Batch 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(34, 'Nursing 3rd Batch 2021', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(35, 'Ph.D 2019', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(36, 'Ph.D 2022', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06'),
            array(37, 'Advance Studies 2022', NULL, '2023-06-30 07:12:06', '2023-06-30 07:12:06')
        ];
        foreach ($data as $item) {
            Batch::create([
                'id' => $item[0],
                'name' => $item[1]
            ]);
        }
    }
}
