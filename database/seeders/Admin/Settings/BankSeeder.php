<?php

namespace Database\Seeders\Admin\Settings;

use App\Models\Admin\Settings\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'name' => 'Bangladesh Bank', 'type' => 'Central Bank'],
            ['id' => '2', 'name' => 'Sonali Bank', 'type' => 'State-owned Commercial'],
            ['id' => '3', 'name' => 'Agrani Bank', 'type' => 'State-owned Commercial'],
            ['id' => '4', 'name' => 'Rupali Bank', 'type' => 'State-owned Commercial'],
            ['id' => '5', 'name' => 'Janata Bank', 'type' => 'State-owned Commercial'],
            // Private Commercial
            ['id' => '6', 'name' => 'Private Commercial Banks', 'type' => 'Private Commercial'],
            ['id' => '7', 'name' => 'Shimanto Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '8', 'name' => 'South Bangla Agri. & Com. Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '9', 'name' => 'Meghna Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '10', 'name' => 'Midland Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '11', 'name' => 'NRB Bank Ltd', 'type' => 'Private Commercial'],
            ['id' => '12', 'name' => 'NRB Commercial Bank Ltd', 'type' => 'Private Commercial'],
            ['id' => '13', 'name' => 'Modhumoti Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '14', 'name' => 'Farmers Banks Limited', 'type' => 'Private Commercial'],
            ['id' => '15', 'name' => 'Shahjalal Islami Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '16', 'name' => 'ICB Islamic Bank', 'type' => 'Private Commercial'],
            ['id' => '17', 'name' => 'AB Bank Ltd', 'type' => 'Private Commercial'],
            ['id' => '18', 'name' => 'Jubilee Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '19', 'name' => 'BRAC Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '20', 'name' => 'Dutch Bangla Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '21', 'name' => 'Eastern Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '22', 'name' => 'United Commercial Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '23', 'name' => 'Mutual Trust Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '24', 'name' => 'Dhaka Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '25', 'name' => 'Islami Bank Bangladesh Ltd', 'type' => 'Private Commercial'],
            ['id' => '26', 'name' => 'Uttara Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '27', 'name' => 'Pubali Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '28', 'name' => 'IFIC Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '29', 'name' => 'National Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '30', 'name' => 'National Credit & Commerce Bank Ltd.	', 'type' => 'Private Commercial'],
            ['id' => '31', 'name' => 'The City Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '32', 'name' => 'NCC Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '33', 'name' => 'Mercantile Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '34', 'name' => 'Southeast Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '35', 'name' => 'Prime Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '36', 'name' => 'Social Islami Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '37', 'name' => 'Union  Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '38', 'name' => 'Islami Somaz Bank Ltd', 'type' => 'Private Commercial'],
            ['id' => '39', 'name' => 'Standard Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '40', 'name' => 'Al-Arafah Islami Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '41', 'name' => 'Bank Al-Falah  Limited', 'type' => 'Private Commercial'],
            ['id' => '42', 'name' => 'One Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '43', 'name' => 'Exim Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '44', 'name' => 'First Security Islami Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '45', 'name' => 'Bank Asia Limited', 'type' => 'Private Commercial'],
            ['id' => '46', 'name' => 'The Premier Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '47', 'name' => 'Bangladesh Commerce Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '48', 'name' => 'Trust Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '49', 'name' => 'Jamuna Bank Limited', 'type' => 'Private Commercial'],
            // Specialized Development
            ['id' => '50', 'name' => 'Agrani SME Financing Company Ltd', 'type' => 'Specialized Development'],
            ['id' => '51', 'name' => 'Karmasangsthan Bank', 'type' => 'Specialized Development'],
            ['id' => '52', 'name' => 'Bangladesh Finance and Investment Company Ltd.	', 'type' => 'Specialized Development'],
            ['id' => '53', 'name' => 'Bangladesh Krishi Bank', 'type' => 'Specialized Development'],
            ['id' => '54', 'name' => 'Bangladesh Industrial Finance Company Ltd', 'type' => 'Specialized Development'],
            ['id' => '55', 'name' => 'Bangladesh Infrastructure Finance Fund Ltd', 'type' => 'Specialized Development'],
            ['id' => '56', 'name' => 'Bay Leasing and Investment Ltd', 'type' => 'Specialized Development'],
            ['id' => '57', 'name' => 'Progoti Bank', 'type' => 'Specialized Development'],
            ['id' => '58', 'name' => 'Rajshahi Krishi Unnayan Bank', 'type' => 'Specialized Development'],
            ['id' => '59', 'name' => 'Reliance Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '60', 'name' => 'SEAF Bangladesh Venture Ltd', 'type' => 'Specialized Development'],
            ['id' => '61', 'name' => 'The UAE-Bangladesh Investment Company Ltd', 'type' => 'Specialized Development'],
            ['id' => '62', 'name' => 'Union Capital Ltd', 'type' => 'Specialized Development'],
            ['id' => '63', 'name' => 'United Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '64', 'name' => 'Uttara Finance and Investments Ltd', 'type' => 'Specialized Development'],
            ['id' => '65', 'name' => 'Saudi-Bangladesh Industrial', 'type' => 'Specialized Development'],
            ['id' => '66', 'name' => 'Bangladesh Development Bank Ltd', 'type' => 'Specialized Development'],
            ['id' => '67', 'name' => 'CAPM Venture Capital and Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '68', 'name' => 'Delta Brac Housing Finance Corporation Ltd', 'type' => 'Specialized Development'],
            ['id' => '69', 'name' => 'Dhaka Mercantile Co-operative Bank Ltd', 'type' => 'Specialized Development'],
            ['id' => '70', 'name' => 'Far-east Finance & Investment Ltd', 'type' => 'Specialized Development'],
            ['id' => '71', 'name' => 'FAS Finance & Investment Ltd', 'type' => 'Specialized Development'],
            ['id' => '72', 'name' => 'GSP Finance Company (Bangladesh) Ltd', 'type' => 'Specialized Development'],
            ['id' => '73', 'name' => 'Hajj Finance Company Ltd', 'type' => 'Specialized Development'],
            ['id' => '74', 'name' => 'IDLC Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '75', 'name' => 'Infrastructure Development Company Ltd', 'type' => 'Specialized Development'],
            ['id' => '76', 'name' => 'Industrial and Infrastructure Ltd', 'type' => 'Specialized Development'],
            ['id' => '77', 'name' => 'Int. Leasing and Financial Services Ltd', 'type' => 'Specialized Development'],
            ['id' => '78', 'name' => 'Investment Corporation of Bangladesh	', 'type' => 'Specialized Development'],
            ['id' => '79', 'name' => 'IPDC Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '80', 'name' => 'Islamic Finance and Investment Ltd.	', 'type' => 'Specialized Development'],
            ['id' => '81', 'name' => 'LankaBangla Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '82', 'name' => 'Meridian Finance and Investment Ltd.	', 'type' => 'Specialized Development'],
            ['id' => '83', 'name' => 'MIDAS Financing Ltd', 'type' => 'Specialized Development'],
            ['id' => '84', 'name' => 'National Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '85', 'name' => 'National Housing Finance and Investments Ltd', 'type' => 'Specialized Development'],
            ['id' => '86', 'name' => 'Non Bank Financial Institutions', 'type' => 'Specialized Development'],
            ['id' => '87', 'name' => "People's Leasing and Financial Services Ltd", 'type' => 'Specialized Development'],
            ['id' => '88', 'name' => "Phoenix Finance and Investments Ltd", 'type' => 'Specialized Development'],
            ['id' => '89', 'name' => "Premier Leasing & Finance Ltd", 'type' => 'Specialized Development'],
            ['id' => '90', 'name' => 'First Finance Ltd', 'type' => 'Specialized Development'],
            ['id' => '91', 'name' => 'Prime Finance & Investment Ltd', 'type' => 'Specialized Development'],
            ['id' => '92', 'name' => 'Bangladesh Somobay Bank Limited', 'type' => 'Specialized Development'],
            ['id' => '93', 'name' => 'Grameen Bank', 'type' => 'Specialized Development'],
            ['id' => '94', 'name' => 'BASIC Bank Limited', 'type' => 'Specialized Development'],
            ['id' => '95', 'name' => 'Ansar VDP Unnyan Bank', 'type' => 'Specialized Development'],
            ['id' => '96', 'name' => 'The Dhaka Mercantile Co-operative Bank Limited(DMCBL)', 'type' => 'Specialized Development'],
            // Foreign Commercial
            ['id' => '97', 'name' => 'Citibank', 'type' => 'Foreign Commercial'],
            ['id' => '98', 'name' => 'HSBC', 'type' => 'Foreign Commercial'],
            ['id' => '99', 'name' => 'Commercial Bank of Ceylon', 'type' => 'Foreign Commercial'],
            ['id' => '100', 'name' => 'Standard Chartered Bank', 'type' => 'Foreign Commercial'],
            ['id' => '101', 'name' => 'CommercialBank of Ceylon', 'type' => 'Foreign Commercial'],
            ['id' => '102', 'name' => 'State Bank of India', 'type' => 'Foreign Commercial'],
            ['id' => '103', 'name' => 'WooriBank', 'type' => 'Foreign Commercial'],
            ['id' => '104', 'name' => 'Bank Alfalah', 'type' => 'Foreign Commercial'],
            ['id' => '105', 'name' => 'National Bank of Pakistan', 'type' => 'Foreign Commercial'],
            ['id' => '106', 'name' => 'ICICI Bank', 'type' => 'Foreign Commercial'],
            ['id' => '107', 'name' => 'Habib Bank Limited', 'type' => 'Foreign Commercial'],
            ['id' => '108', 'name' => 'City Bank Limited', 'type' => 'Private Commercial'],
            ['id' => '109', 'name' => 'Bkash Limited', 'type' => 'Private Commercial'],
            ['id' => '110', 'name' => 'Nagad Limited', 'type' => 'Private Commercial'],
        ];
        foreach ($data as $item) {
            Bank::create([
                'id' => $item['id'],
                'name' => $item['name']
            ]);
        }
    }
}
