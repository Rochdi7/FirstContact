<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['code' => 'USA', 'translations' => ['en' => 'United States', 'fr' => 'États-Unis', 'ar' => 'الولايات المتحدة']],
            ['code' => 'CAN', 'translations' => ['en' => 'Canada', 'fr' => 'Canada', 'ar' => 'كندا']],
            ['code' => 'MEX', 'translations' => ['en' => 'Mexico', 'fr' => 'Mexique', 'ar' => 'المكسيك']],
            ['code' => 'BRA', 'translations' => ['en' => 'Brazil', 'fr' => 'Brésil', 'ar' => 'البرازيل']],
            ['code' => 'ARG', 'translations' => ['en' => 'Argentina', 'fr' => 'Argentine', 'ar' => 'الأرجنتين']],
            ['code' => 'COL', 'translations' => ['en' => 'Colombia', 'fr' => 'Colombie', 'ar' => 'كولومبيا']],
            ['code' => 'CHL', 'translations' => ['en' => 'Chile', 'fr' => 'Chili', 'ar' => 'تشيلي']],
            ['code' => 'PER', 'translations' => ['en' => 'Peru', 'fr' => 'Pérou', 'ar' => 'بيرو']],
            ['code' => 'VEN', 'translations' => ['en' => 'Venezuela', 'fr' => 'Venezuela', 'ar' => 'فنزويلا']],
            ['code' => 'ECU', 'translations' => ['en' => 'Ecuador', 'fr' => 'Équateur', 'ar' => 'الإكوادور']],
            ['code' => 'GBR', 'translations' => ['en' => 'United Kingdom', 'fr' => 'Royaume-Uni', 'ar' => 'المملكة المتحدة']],
            ['code' => 'FRA', 'translations' => ['en' => 'France', 'fr' => 'France', 'ar' => 'فرنسا']],
            ['code' => 'DEU', 'translations' => ['en' => 'Germany', 'fr' => 'Allemagne', 'ar' => 'ألمانيا']],
            ['code' => 'ITA', 'translations' => ['en' => 'Italy', 'fr' => 'Italie', 'ar' => 'إيطاليا']],
            ['code' => 'ESP', 'translations' => ['en' => 'Spain', 'fr' => 'Espagne', 'ar' => 'إسبانيا']],
            ['code' => 'NLD', 'translations' => ['en' => 'Netherlands', 'fr' => 'Pays-Bas', 'ar' => 'هولندا']],
            ['code' => 'BEL', 'translations' => ['en' => 'Belgium', 'fr' => 'Belgique', 'ar' => 'بلجيكا']],
            ['code' => 'CHE', 'translations' => ['en' => 'Switzerland', 'fr' => 'Suisse', 'ar' => 'سويسرا']],
            ['code' => 'SWE', 'translations' => ['en' => 'Sweden', 'fr' => 'Suède', 'ar' => 'السويد']],
            ['code' => 'NOR', 'translations' => ['en' => 'Norway', 'fr' => 'Norvège', 'ar' => 'النرويج']],
            ['code' => 'DNK', 'translations' => ['en' => 'Denmark', 'fr' => 'Danemark', 'ar' => 'الدنمارك']],
            ['code' => 'FIN', 'translations' => ['en' => 'Finland', 'fr' => 'Finlande', 'ar' => 'فنلندا']],
            ['code' => 'RUS', 'translations' => ['en' => 'Russia', 'fr' => 'Russie', 'ar' => 'روسيا']],
            ['code' => 'CHN', 'translations' => ['en' => 'China', 'fr' => 'Chine', 'ar' => 'الصين']],
            ['code' => 'JPN', 'translations' => ['en' => 'Japan', 'fr' => 'Japon', 'ar' => 'اليابان']],
            ['code' => 'KOR', 'translations' => ['en' => 'South Korea', 'fr' => 'Corée du Sud', 'ar' => 'كوريا الجنوبية']],
            ['code' => 'IND', 'translations' => ['en' => 'India', 'fr' => 'Inde', 'ar' => 'الهند']],
            ['code' => 'IDN', 'translations' => ['en' => 'Indonesia', 'fr' => 'Indonésie', 'ar' => 'إندونيسيا']],
            ['code' => 'SAU', 'translations' => ['en' => 'Saudi Arabia', 'fr' => 'Arabie Saoudite', 'ar' => 'السعودية']],
            ['code' => 'TUR', 'translations' => ['en' => 'Turkey', 'fr' => 'Turquie', 'ar' => 'تركيا']],
            ['code' => 'ZAF', 'translations' => ['en' => 'South Africa', 'fr' => 'Afrique du Sud', 'ar' => 'جنوب أفريقيا']],
            ['code' => 'NGA', 'translations' => ['en' => 'Nigeria', 'fr' => 'Nigéria', 'ar' => 'نيجيريا']],
            ['code' => 'EGY', 'translations' => ['en' => 'Egypt', 'fr' => 'Égypte', 'ar' => 'مصر']],
            ['code' => 'MAR', 'translations' => ['en' => 'Morocco', 'fr' => 'Maroc', 'ar' => 'المغرب']],
            ['code' => 'DZA', 'translations' => ['en' => 'Algeria', 'fr' => 'Algérie', 'ar' => 'الجزائر']],
            ['code' => 'IRN', 'translations' => ['en' => 'Iran', 'fr' => 'Iran', 'ar' => 'إيران']],
            ['code' => 'PAK', 'translations' => ['en' => 'Pakistan', 'fr' => 'Pakistan', 'ar' => 'باكستان']],
            ['code' => 'THA', 'translations' => ['en' => 'Thailand', 'fr' => 'Thaïlande', 'ar' => 'تايلاند']],
            ['code' => 'PHL', 'translations' => ['en' => 'Philippines', 'fr' => 'Philippines', 'ar' => 'الفلبين']],
            ['code' => 'VNM', 'translations' => ['en' => 'Vietnam', 'fr' => 'Vietnam', 'ar' => 'فيتنام']],
            ['code' => 'MYS', 'translations' => ['en' => 'Malaysia', 'fr' => 'Malaisie', 'ar' => 'ماليزيا']],
            ['code' => 'SGP', 'translations' => ['en' => 'Singapore', 'fr' => 'Singapour', 'ar' => 'سنغافورة']],
            ['code' => 'AUS', 'translations' => ['en' => 'Australia', 'fr' => 'Australie', 'ar' => 'أستراليا']],
            ['code' => 'NZL', 'translations' => ['en' => 'New Zealand', 'fr' => 'Nouvelle-Zélande', 'ar' => 'نيوزيلندا']],
            ['code' => 'PSE', 'translations' => ['en' => 'Palestine', 'fr' => 'Palestine', 'ar' => 'فلسطين']],
            ['code' => 'QAT', 'translations' => ['en' => 'Qatar', 'fr' => 'Qatar', 'ar' => 'قطر']],
            ['code' => 'ARE', 'translations' => ['en' => 'United Arab Emirates', 'fr' => 'Émirats Arabes Unis', 'ar' => 'الإمارات العربية المتحدة']],
            ['code' => 'JOR', 'translations' => ['en' => 'Jordan', 'fr' => 'Jordanie', 'ar' => 'الأردن']],
            ['code' => 'KWT', 'translations' => ['en' => 'Kuwait', 'fr' => 'Koweït', 'ar' => 'الكويت']],
            ['code' => 'LBN', 'translations' => ['en' => 'Lebanon', 'fr' => 'Liban', 'ar' => 'لبنان']],
        ];

        foreach ($countries as $data) {
            $country = Country::updateOrCreate(['code' => $data['code']]);
            foreach ($data['translations'] as $locale => $name) {
                $country->translateOrNew($locale)->name = $name;
            }
            $country->save();
        }
    }
}
