<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            INSERT INTO `districts` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
            array(1, 'Comilla', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 12:51:35', NULL),
            array(2, 'Feni', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(3, 'Brahmanbaria', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(4, 'Rangamati', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(5, 'Noakhali', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(6, 'Chandpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(7, 'Lakshmipur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(8, 'Chattogram', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(9, 'Coxsbazar', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(10, 'Khagrachhari', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(11, 'Bandarban', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(12, 'Sirajganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(13, 'Pabna', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(14, 'Bogura', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(15, 'Rajshahi', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(16, 'Natore', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(17, 'Joypurhat', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(18, 'Chapainawabganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(19, 'Naogaon', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(20, 'Jashore', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(21, 'Satkhira', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(22, 'Meherpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(23, 'Narail', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(24, 'Chuadanga', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(25, 'Kushtia', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(26, 'Magura', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(27, 'Khulna', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(28, 'Bagerhat', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(29, 'Jhenaidah', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(30, 'Jhalakathi', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(31, 'Patuakhali', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(32, 'Pirojpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(33, 'Barisal', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(34, 'Bhola', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(35, 'Barguna', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(36, 'Sylhet', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(37, 'Moulvibazar', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(38, 'Habiganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(39, 'Sunamganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(40, 'Narsingdi', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(41, 'Gazipur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(42, 'Shariatpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(43, 'Narayanganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(44, 'Tangail', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(45, 'Kishoreganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(46, 'Manikganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(47, 'Dhaka', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(48, 'Munshiganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(49, 'Rajbari', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(50, 'Madaripur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(51, 'Gopalganj', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(52, 'Faridpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(53, 'Panchagarh', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(54, 'Dinajpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(55, 'Lalmonirhat', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(56, 'Nilphamari', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(57, 'Gaibandha', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(58, 'Thakurgaon', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(59, 'Rangpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(60, 'Kurigram', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(61, 'Sherpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(62, 'Mymensingh', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(63, 'Jamalpur', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(64, 'Netrokona', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL)
        ];
        foreach ($data as $item) {
            District::create([
                'id' => $item[0],
                'name' => $item[1]
            ]);
        }
    }
}
