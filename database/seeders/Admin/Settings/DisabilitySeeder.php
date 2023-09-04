<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\Disability;
use Illuminate\Database\Seeder;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //INSERT INTO `disabilities` (`id`, `name`, `en_name`, `bn_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
            array(1, 'Not Applicable (প্রজোয্য নয়)', 'N/A', 'প্রজোয্য নয়', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 12:53:47', NULL),
            array(2, 'Autism or autism spectrum disorders(অটিজম)', 'Autism', 'অটিজম', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(3, 'Physical Disability(শারীরিক অক্ষমতা)', 'Physical', 'শারীরিক অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(4, 'Mental Illness(মানসিক অসুস্থতা)', 'Mental Illness', 'মানসিক অসুস্থতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(5, 'Visual Disability(দৃষ্টি অক্ষমতা)', 'Visual', 'দৃষ্টি অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(6, 'Speech Disability(বক্তৃতা অক্ষমতা)', 'Speech', 'বক্তৃতা অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(7, 'Intellectual Disability(বুদ্ধি অক্ষমতা)', 'Intellectual', 'বুদ্ধি অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(8, 'Hearing Disability(শ্রবণ অক্ষমতা)', 'Hearing', 'শ্রবণ অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(9, 'Deaf Disability(শ্রবণ-দৃষ্টি অক্ষমতা)', 'Deaf', 'শ্রবণ-দৃষ্টি অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(10, 'Cerebral Palsy(সেরিব্রাল পালসি)', 'Cerebral Palsy', 'সেরিব্রাল পালসি', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(11, 'Down Syndrome (ডাউন সিনড্রোম)', 'Down Syndrom', 'ডাউন সিনড্রোম', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(12, 'Multiple Disability(একাধিক অক্ষমতা)', 'Multiple', 'একাধিক অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL),
            array(13, 'Other Disability(অন্যান্য অক্ষমতা)', 'Other', 'অন্যান্য অক্ষমতা', 'Active', 1, NULL, '2023-04-11 00:37:47', NULL, NULL)
        ];
        foreach ($data as $item) {
            Disability::create([
                'id' => $item[0],
                'name' => $item[1]
            ]);
        }
    }
}
