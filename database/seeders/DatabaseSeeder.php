<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\CommonStatus;
use App\Models\User;
use Database\Seeders\Admin\Settings\BankSeeder;
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
            'name' => 'Admin',
            'email' => 'gsp_temp_2@gmail.com',
            'mobile' => 01700000000,
            'password' => '1gsp_temp_2@gmail.com',
            'role' => User::ADMIN,
            'status' => CommonStatus::Active
        ]);
        User::create([
            'name' => 'Al-Mamun Ilias',
            'email' => 'almamun.ilias@czm-bd.org',
            'mobile' => 01700000001,
            'password' => '582almamun.ilias@czm-bd.org',
            'role' => User::ADMIN,
            'status' => CommonStatus::Active
        ]);
        User::create([
            'name' => 'Rakibul Islam',
            'email' => 'rakibul@czm-bd.org',
            'mobile' => 01700000002,
            'password' => 'rakibul@czm-bd.org789',
            'role' => User::ADMIN,
            'status' => CommonStatus::Active
        ]);
        $this->call([
//            AcademicSessionSeeder::class,
//            BatchSeeder::class,
//            ZoneSeeder::class,
//            SponsorSeeder::class,
            BankSeeder::class,
//            DepartmentSeeder::class,
//            DisabilitySeeder::class,
//            DistrictSeeder::class,
//            InstituteSeeder::class,
//            OccupationSeeder::class,
//            UpazilaSeeder::class,
//            UnionSeeder::class,
        ]);
    }
}
