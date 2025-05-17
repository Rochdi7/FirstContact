<?php

namespace Database\Seeders;

use App\Models\StoreType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class StoreTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['translations' => ['en' => 'Restaurants', 'fr' => 'Restaurants', 'ar' => 'مطاعم']],
            ['translations' => ['en' => 'Cafés & Coffee Shops', 'fr' => 'Cafés et coffee shops', 'ar' => 'المقاهي']],
            ['translations' => ['en' => 'Dark Kitchens / Ghost Kitchens', 'fr' => 'Cuisines fantômes', 'ar' => 'المطابخ السحابية']],
            ['translations' => ['en' => 'Catering Services', 'fr' => 'Services traiteur', 'ar' => 'خدمات التموين']],
            ['translations' => ['en' => 'Bakeries', 'fr' => 'Boulangeries', 'ar' => 'المخابز']],
            ['translations' => ['en' => 'Food Trucks', 'fr' => 'Camions de restauration', 'ar' => 'شاحنات الطعام']],
            ['translations' => ['en' => 'Quick Service Restaurants (QSRs)', 'fr' => 'Restaurants rapides', 'ar' => 'مطاعم الخدمة السريعة']],
            ['translations' => ['en' => 'Pizzerias', 'fr' => 'Pizzerias', 'ar' => 'محلات البيتزا']],
            ['translations' => ['en' => 'Juice Bars / Smoothie Shops', 'fr' => 'Bars à jus', 'ar' => 'محلات العصائر']],
            ['translations' => ['en' => 'Meal Prep Services', 'fr' => 'Préparation de repas', 'ar' => 'خدمات إعداد الوجبات']],
            ['translations' => ['en' => 'Delis & Takeout Shops', 'fr' => 'Épiceries & plats à emporter', 'ar' => 'المحلات الجاهزة للأكل']],
            ['translations' => ['en' => 'Supermarkets with Deli Sections', 'fr' => 'Supermarchés avec sections traiteur', 'ar' => 'السوبرماركت مع أقسام المأكولات الجاهزة']],
            ['translations' => ['en' => 'Multi-Location Chains', 'fr' => 'Chaînes multi-emplacements', 'ar' => 'سلاسل متعددة الفروع']],
        ];

        foreach ($types as $data) {
            $storeType = StoreType::create();

            foreach ($data['translations'] as $locale => $name) {
                $storeType->translateOrNew($locale)->name = $name;
            }

            $storeType->save();
        }
    }
}
