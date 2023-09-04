<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\CommonStatus;
use App\Models\User;
use Database\Seeders\Admin\Settings\AcademicSessionSeeder;
use Database\Seeders\Admin\Settings\BankSeeder;
use Database\Seeders\Admin\Settings\BatchSeeder;
use Database\Seeders\Admin\Settings\DepartmentSeeder;
use Database\Seeders\Admin\Settings\DisabilitySeeder;
use Database\Seeders\Admin\Settings\DistrictSeeder;
use Database\Seeders\Admin\Settings\InstituteSeeder;
use Database\Seeders\Admin\Settings\OccupationSeeder;
use Database\Seeders\Admin\Settings\SponsorSeeder;
use Database\Seeders\Admin\Settings\UnionSeeder;
use Database\Seeders\Admin\Settings\UpazilaSeeder;
use Database\Seeders\Admin\Settings\ZoneSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'gsp_temp@gmail.com',
            'mobile' => 01700000000,
            'password' => 'gsp_temp@gmail.com',
            'role' => User::ADMIN,
            'status' => CommonStatus::Active
        ]);
        $this->call([
            AcademicSessionSeeder::class,
            BatchSeeder::class,
            ZoneSeeder::class,
            SponsorSeeder::class,
            BankSeeder::class,
            DepartmentSeeder::class,
            DisabilitySeeder::class,
            DistrictSeeder::class,
            InstituteSeeder::class,
            OccupationSeeder::class,
            UpazilaSeeder::class,
            UnionSeeder::class,
        ]);
    }
}
