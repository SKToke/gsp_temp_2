<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\AcademicSession;
use Illuminate\Database\Seeder;

class AcademicSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            INSERT INTO `academic_sessions` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
            array(1, '2021-22', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(2, '2020-21', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(3, '2019-20', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(4, '2018-19', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(5, '2017-18', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(6, '2016-17', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(7, '2015-16', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53'),
            array(8, '2022-23', NULL, '2023-06-29 18:08:53', '2023-06-29 18:08:53')
        ];
        foreach ($data as $item) {
            AcademicSession::create([
                'id' => $item[0],
                'name' => $item[1]
            ]);
        }
    }
}
