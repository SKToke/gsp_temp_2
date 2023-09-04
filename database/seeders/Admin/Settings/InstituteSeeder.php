<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\Institute;
use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
//            INSERT INTO `institutes` (`id`, `name`, `zone`, `short_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
            array(1, 'Patuakhali Medical College (PkMC), Patuakhali', 'Barisal', 'PkMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:03', NULL),
            array(2, 'Sher - e - Bangla Medical College (SBMC), Barisal', 'Barisal', 'SBMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:08', NULL),
            array(3, 'Barisal University (BU), Barisal', 'Barisal', 'BU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:13', NULL),
            array(4, 'Patuakhali Science and Technology University (PSTU), Patuakhali', 'Barisal', 'PSTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:11', NULL),
            array(5, 'Chittagong Medical College (CMC), Chittagong', 'Chittagong', 'CMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:15', NULL),
            array(6, 'Cox\'s Bazar Medical College (CoxMC), Cox\'s Bazar', 'Chittagong', 'CoxMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:15:03', NULL),
            array(7, 'Rangamati Medical College (RmMC), Rangamati', 'Chittagong', 'RmMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:15:00', NULL),
            array(8, 'Chittagong University of Engineering & Technology (CUET), Chittagong', 'Chittagong', 'CUET', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:58', NULL),
            array(9, 'Chittagong Veterinary and Animal Sciences University (CVASU), Chittagong', 'Chittagong', 'CVASU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:56', NULL),
            array(10, 'Rangamati Science and Technology University (RmSTU), Rangamati', 'Chittagong', 'RmSTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:53', NULL),
            array(11, 'University of Chittagong (CU), Chittagong', 'Chittagong', 'CU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:51', NULL),
            array(12, 'Abdul Malek Ukil Medical College (AMUMC), Noakhali', 'Cumilla', 'AMUMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:15:08', NULL),
            array(13, 'Chandpur Medical College (ChMC), Chandpur', 'Cumilla', 'ChMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:49', NULL),
            array(14, 'Comilla Medical College (CoMC), Comilla', 'Cumilla', 'CoMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:47', NULL),
            array(15, 'Comilla University (CoU), Comilla', 'Cumilla', 'CoU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:42', NULL),
            array(16, 'Noakhali Science & Technology University (NSTU), Noakhali', 'Cumilla', 'NSTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:40', NULL),
            array(17, 'Dhaka Dental College (DDC), Dhaka', 'Dhaka', 'DDC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:37', NULL),
            array(18, 'Dhaka Medical College (DMC), Dhaka', 'Dhaka', 'DMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:35', NULL),
            array(19, 'Mugda Medical College (MuMC), Dhaka', 'Dhaka', 'MuMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:33', NULL),
            array(20, 'Shaheed Suhrawardy Medical College (ShSMC), Dhaka', 'Dhaka', 'ShSMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:31', NULL),
            array(21, 'Shaheed Tajuddin Ahmad Medical College (STAMC), Gazipur', 'Dhaka', 'STAMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:30', NULL),
            array(22, 'Sir Salimullah Medical College (SSMC), Dhaka', 'Dhaka', 'SSMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:14:28', NULL),
            array(23, 'Bangabandhu Sheikh Mujibur Rahman Agricultural University (BSMRAU), Gazipur', 'Dhaka', 'BSMRAU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:22', NULL),
            array(24, 'Bangladesh Textile University (BUTex), Dhaka', 'Dhaka', 'BUTex', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:24', NULL),
            array(25, 'Bangladesh University of Engineering & Technology (BUET), Dhaka', 'Dhaka', 'BUET', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:27', NULL),
            array(26, 'Dhaka University of Engineering & Technology (DUET), Gazipur', 'Dhaka', 'DUET', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:30', NULL),
            array(27, 'Jagannath University (JNU), Dhaka', 'Dhaka', 'JNU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:33', NULL),
            array(28, 'Jahangirnagar University (JU), Dhaka', 'Dhaka', 'JU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:35', NULL),
            array(29, 'Colonel Malek Medical College, Manikganj', 'Dhaka', 'CMMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:42', NULL),
            array(30, 'Sher - e - Bangla Agricultural University (SbAU), Dhaka', 'Dhaka', 'SbAU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:45', NULL),
            array(31, 'University of Dhaka (DU), Dhaka', 'Dhaka', 'DU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:47', NULL),
            array(32, 'Satkhira Medical College (SMC), Satkhira', 'Khulna', 'SMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:50', NULL),
            array(33, 'Sheikh Sayera Khatun Medical College (SSKMC), Gopalganj', 'Khulna', 'SSKMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:52', NULL),
            array(34, 'Bangabandhu Sheikh Mujibur Rahman Science & Technology University (BSMRSTU), Gopalganj', 'Khulna', 'BSMRSTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:55', NULL),
            array(35, 'Khulna Agricultural University (KAU), Khulna', 'Khulna', 'KAU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:17:57', NULL),
            array(36, 'Khulna University (KU), Khulna', 'Khulna', 'KU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:00', NULL),
            array(37, 'Khulna University of Engineering and Technology (KUET), Khulna', 'Khulna', 'KUET', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:04', NULL),
            array(38, 'Bangabandhu Sheikh Mujib Medical College, Faridpur', 'Kushtia', 'BSMMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:14', NULL),
            array(39, 'Jashore Medical College (JMC), Jessore', 'Kushtia', 'JMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:19', NULL),
            array(40, 'Khulna Medical College (KMC), Khulna', 'Kushtia', 'KMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:22', NULL),
            array(41, 'Kushtia Medical College (KuMC), Kushtia', 'Kushtia', 'KuMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:24', NULL),
            array(42, 'Magura Medical College (MgMC), Magura', 'Kushtia', 'MgMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:27', NULL),
            array(43, 'Islamic University (IU), Bangladesh', 'Kushtia', 'IU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:31', NULL),
            array(44, 'Jashore University of Science and Technology (JUST), Jashore', 'Kushtia', 'JUST', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:36', NULL),
            array(45, 'Sheikh Hasina Medical College (ShMCJ), Jamalpur', 'Mymensingh', 'ShMCJ', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:38', NULL),
            array(46, 'Mymensingh Medical College (MMC), Mymensingh', 'Mymensingh', 'MMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:40', NULL),
            array(47, 'Netrokona Medical College (NtMC), Netrokona', 'Mymensingh', 'NtMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:43', NULL),
            array(48, 'Shahid Syed Nazrul Islam Medical College (SSNIMC), Kishoreganj', 'Mymensingh', 'SSNIMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:46', NULL),
            array(49, 'Sheikh Hasina Medical College (TMC), Tangail', 'Mymensingh', 'TMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:48', NULL),
            array(50, 'Bangamata Sheikh Fojilatunnesa Mujib Science & Technology University (BSFMSCTU), Jamalpur', 'Mymensingh', 'BSFMSCTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:51', NULL),
            array(51, 'Bangladesh Agricultural University (BAU), Mymensingh', 'Mymensingh', 'BAU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:54', NULL),
            array(52, 'Jatiya Kabi Kazi Nazrul Islam University (JKKNIU), Mymensingh', 'Mymensingh', 'JKKNIU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:56', NULL),
            array(53, 'Mawlana Bhashani Science & Technology University (MBSTU), Tangail', 'Mymensingh', 'MBSTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:18:59', NULL),
            array(54, 'Sheikh Hasina University (SHU), Netrokona', 'Mymensingh', 'SHU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:01', NULL),
            array(55, 'Naogaon Medical College (NgMC), Naogaon', 'Rajshahi', 'NgMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:04', NULL),
            array(56, 'Pabna Medical College (PMC), Pabna', 'Rajshahi', 'PMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:08', NULL),
            array(57, 'Rajshahi Medical College (RMC), Rajshahi', 'Rajshahi', 'RMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:10', NULL),
            array(58, 'Shaheed M . Monsur Ali Medical College (SMMAMC), Sirajganj', 'Rajshahi', 'SMMAMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:13', NULL),
            array(59, 'Shaheed Ziaur Rahman Medical College (SZMC), Bogra', 'Rajshahi', 'SZMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:16', NULL),
            array(60, 'Pabna University of Science & Technology (PUST), Pabna', 'Rajshahi', 'PUST', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:19', NULL),
            array(61, 'Rabindra University (RbU), Sirajganj', 'Rajshahi', 'RbU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:21', NULL),
            array(62, 'Rajshahi University of Engineering & Technology (RUET), Rajshahi', 'Rajshahi', 'RUET', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:25', NULL),
            array(63, 'University of Rajshahi(RU), Rajshahi', 'Rajshahi', 'RU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:29', NULL),
            array(64, 'M Abdur Rahim Medical College (MARMC), Dinajpur', 'Rangpur', 'MARMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:31', NULL),
            array(65, 'Nilphamari Medical College (NilMC), Nilphamari', 'Rangpur', 'NilMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:38', NULL),
            array(66, 'Rangpur Medical College (RpMC), Rangpur', 'Rangpur', 'RpMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:41', NULL),
            array(67, 'Begum Rokeya University (BRUR), Rangpur', 'Rangpur', 'BRUR', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:44', NULL),
            array(68, 'Hajee Mohammad Danesh Science & Technology University (HSTU), Dinajpur', 'Rangpur', 'HSTU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:46', NULL),
            array(69, 'Bangabandhu Medical College (BMC), Sunamganj', 'Sylhet', 'BMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:50', NULL),
            array(70, 'Sheikh Hasina Medical College (HbMC), Habigonj', 'Sylhet', 'HbMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:52', NULL),
            array(71, 'Sylhet Osmani Medical College (SoMC), Sylhet', 'Sylhet', 'SoMC', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:55', NULL),
            array(72, 'Shahjalal University of Science & Technology (SUST), Sylhet', 'Sylhet', 'SUST', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:19:57', NULL),
            array(73, 'Sylhet Agricultural University (SyAU), Sylhet', 'Sylhet', 'SyAU', 'Active', 1, NULL, '2023-04-11 00:37:47', '2023-06-04 08:20:00', NULL),
            array(74, 'Ibn Sina Nursing Institute', 'Nursing', 'IbnSina', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:12:42', NULL),
            array(75, 'CRP Nursing College', 'Nursing', 'CRP', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:12:31', NULL),
            array(76, 'Dhaka College', 'HSC', 'DC', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:13:04', NULL),
            array(77, 'Government Bangla College', 'HSC', 'GBC', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:13:10', NULL),
            array(78, 'Kabi Nazrul Government College', 'HSC', 'KNGC', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:13:18', NULL),
            array(79, 'Begum Badrunnesa Government College', 'HSC', 'BBGC', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:13:24', NULL),
            array(80, 'Sonaimuri Govt . College', 'HSC', 'SonGC', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:12:56', NULL),
            array(81, 'Al - Azhar University, Egypt', 'Advance Studies', 'AlAzhar', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:12:47', NULL),
            array(82, 'International Islamic University Malaysia', 'Ph . D .', 'ISUM', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:12:12', NULL),
            array(83, 'Universiti Sains Islam, Malaysia', 'Ph . D .', 'USIM', 'Inactive', 1, NULL, '2023-04-11 00:37:47', '2023-04-11 13:12:05', NULL),
            array(84, 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', 'Mymensingh', 'BSMRU', 'Active', 1, NULL, '2023-04-12 07:14:49', '2023-06-04 08:14:00', NULL),
            array(85, 'Habiganj Agricultural University', 'Sylhet', 'HAU', 'Active', 1, NULL, '2023-04-21 15:57:40', '2023-06-04 08:13:58', NULL),
            array(86, 'Bangabandhu Sheikh Mujibur Rahman Aviation and Aerospace University', 'Dhaka', 'BSMRAAU', 'Active', 1, NULL, '2023-05-27 08:01:17', '2023-06-04 08:13:27', NULL),
            array(87, 'Government Shaheed Suhrawardy College, Dhaka', 'HSC', 'GSSC', 'Active', 1, NULL, '2023-05-27 08:01:17', '2023-06-04 08:13:27', NULL),
            array(88, 'Wuhan Institute of Technology, Wuhan, China', 'Advance Studies', 'WIT', 'Active', 1, NULL, '2023-05-27 08:01:17', '2023-06-04 08:13:27', NULL),
            array(89, 'Tianjin University, China', 'Advance Studies', 'TU', 'Active', 1, NULL, '2023-05-27 08:01:17', '2023-06-04 08:13:27', NULL),     ];
        foreach ($data as $item) {
            Institute::create([
                'id' => $item[0],
                'name' => $item[1]
            ]);
        }
    }
}
