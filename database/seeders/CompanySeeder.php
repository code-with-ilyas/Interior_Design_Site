<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create directory if it doesn't exist
        $storagePath = storage_path('app/public/companies');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        // Create placeholder logo images
        $logos = [
            'loreal-logo.png',
            'etam-logo.png',
            'sodexo-logo.png',
            'renault-logo.png',
            'lvmh-logo.png',
            'chanel-logo.png',
            'bnp-paribas-logo.png',
            'air-liquide-logo.png',
            'estee-lauder-logo.png',
            'la-poste-logo.png',
            'credit-agricole-logo.png',
            'bpce-logo.png',
            'kering-logo.png',
            'engie-logo.png',
            'leroy-merlin-logo.png',
        ];

        // Create simple placeholder images
        foreach ($logos as $filename) {
            $filePath = $storagePath . '/' . $filename;
            if (!file_exists($filePath)) {
                // Create a simple placeholder image
                $image = imagecreate(200, 100);
                $background = imagecolorallocate($image, 200, 200, 200);
                $textColor = imagecolorallocate($image, 50, 50, 50);

                // Add text with the filename
                $text = substr($filename, 0, strpos($filename, '-logo'));
                $fontSize = 5;
                $textWidth = imagefontwidth($fontSize) * strlen($text);
                $x = (200 - $textWidth) / 2;
                $y = 45;

                imagestring($image, $fontSize, $x, $y, $text, $textColor);

                imagepng($image, $filePath);
                imagedestroy($image);
            }
        }

        $companies = [
            [
                'name' => 'L\'Oréal',
                'logo' => 'companies/loreal-logo.png',
                'website_url' => 'https://www.loreal.com',
            ],
            [
                'name' => 'Etam',
                'logo' => 'companies/etam-logo.png',
                'website_url' => 'https://www.etam.com',
            ],
            [
                'name' => 'Sodexo',
                'logo' => 'companies/sodexo-logo.png',
                'website_url' => 'https://www.sodexo.com',
            ],
            [
                'name' => 'Renault',
                'logo' => 'companies/renault-logo.png',
                'website_url' => 'https://www.renault.com',
            ],
            [
                'name' => 'LVMH',
                'logo' => 'companies/lvmh-logo.png',
                'website_url' => 'https://www.lvmh.com',
            ],
            [
                'name' => 'Chanel',
                'logo' => 'companies/chanel-logo.png',
                'website_url' => 'https://www.chanel.com',
            ],
            [
                'name' => 'BNP Paribas',
                'logo' => 'companies/bnp-paribas-logo.png',
                'website_url' => 'https://www.bnpparibas.com',
            ],
            [
                'name' => 'Air Liquide',
                'logo' => 'companies/air-liquide-logo.png',
                'website_url' => 'https://www.airliquide.com',
            ],
            [
                'name' => 'Estee Lauder',
                'logo' => 'companies/estee-lauder-logo.png',
                'website_url' => 'https://www.esteelauder.com',
            ],
            [
                'name' => 'La Poste',
                'logo' => 'companies/la-poste-logo.png',
                'website_url' => 'https://www.laposte.fr',
            ],
            [
                'name' => 'Credit Agricole',
                'logo' => 'companies/credit-agricole-logo.png',
                'website_url' => 'https://www.credit-agricole.com',
            ],
            [
                'name' => 'BPCE',
                'logo' => 'companies/bpce-logo.png',
                'website_url' => 'https://www.bpce.fr',
            ],
            [
                'name' => 'Kering',
                'logo' => 'companies/kering-logo.png',
                'website_url' => 'https://www.kering.com',
            ],
            [
                'name' => 'Engie',
                'logo' => 'companies/engie-logo.png',
                'website_url' => 'https://www.engie.com',
            ],
            [
                'name' => 'Leroy Merlin',
                'logo' => 'companies/leroy-merlin-logo.png',
                'website_url' => 'https://www.leroymerlin.com',
            ],
        ];

        foreach ($companies as $companyData) {
            Company::create($companyData);
        }
    }
}
