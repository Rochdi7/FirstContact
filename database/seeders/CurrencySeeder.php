<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            [
                'code' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.000000, 'country_code' => 'USA',
                'translations' => ['en' => 'United States Dollar', 'fr' => 'Dollar américain', 'ar' => 'الدولار الأمريكي'],
            ],
            [
                'code' => 'MAD', 'symbol' => 'DH', 'exchange_rate' => 10.00, // Approximate exchange rate, update as needed'country_code' => 'MAR',
                'translations' => [
                    'en' => 'Moroccan Dirham',
                    'fr' => 'Dirham marocain',
                    'ar' => 'الدرهم المغربي',
                ],
            ],
            [
                'code' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.92, 'country_code' => 'EU',
                'translations' => ['en' => 'Euro', 'fr' => 'Euro', 'ar' => 'اليورو'],
            ],
            [
                'code' => 'GBP', 'symbol' => '£', 'exchange_rate' => 0.78, 'country_code' => 'GBR',
                'translations' => ['en' => 'British Pound', 'fr' => 'Livre sterling', 'ar' => 'الجنيه الإسترليني'],
            ],
            [
                'code' => 'JPY', 'symbol' => '¥', 'exchange_rate' => 150.25, 'country_code' => 'JPN',
                'translations' => ['en' => 'Japanese Yen', 'fr' => 'Yen japonais', 'ar' => 'الين الياباني'],
            ],
            [
                'code' => 'CHF', 'symbol' => 'CHF', 'exchange_rate' => 0.92, 'country_code' => 'CHE',
                'translations' => ['en' => 'Swiss Franc', 'fr' => 'Franc suisse', 'ar' => 'الفرنك السويسري'],
            ],
            [
                'code' => 'CAD', 'symbol' => '$', 'exchange_rate' => 1.34, 'country_code' => 'CAN',
                'translations' => ['en' => 'Canadian Dollar', 'fr' => 'Dollar canadien', 'ar' => 'الدولار الكندي'],
            ],
            [
                'code' => 'AUD', 'symbol' => '$', 'exchange_rate' => 1.55, 'country_code' => 'AUS',
                'translations' => ['en' => 'Australian Dollar', 'fr' => 'Dollar australien', 'ar' => 'الدولار الأسترالي'],
            ],
            [
                'code' => 'CNY', 'symbol' => '¥', 'exchange_rate' => 7.10, 'country_code' => 'CHN',
                'translations' => ['en' => 'Chinese Yuan', 'fr' => 'Yuan chinois', 'ar' => 'اليوان الصيني'],
            ],
            [
                'code' => 'INR', 'symbol' => '₹', 'exchange_rate' => 82.90, 'country_code' => 'IND',
                'translations' => ['en' => 'Indian Rupee', 'fr' => 'Roupie indienne', 'ar' => 'الروبية الهندية'],
            ],
            [
                'code' => 'BRL', 'symbol' => 'R$', 'exchange_rate' => 5.20, 'country_code' => 'BRA',
                'translations' => ['en' => 'Brazilian Real', 'fr' => 'Réal brésilien', 'ar' => 'الريال البرازيلي'],
            ],
            [
                'code' => 'RUB', 'symbol' => '₽', 'exchange_rate' => 94.50, 'country_code' => 'RUS',
                'translations' => ['en' => 'Russian Ruble', 'fr' => 'Rouble russe', 'ar' => 'الروبل الروسي'],
            ],
            [
                'code' => 'SAR', 'symbol' => '﷼', 'exchange_rate' => 3.75, 'country_code' => 'SAU',
                'translations' => ['en' => 'Saudi Riyal', 'fr' => 'Riyal saoudien', 'ar' => 'الريال السعودي'],
            ],
            [
                'code' => 'AED', 'symbol' => 'د.إ', 'exchange_rate' => 3.67, 'country_code' => 'ARE',
                'translations' => ['en' => 'UAE Dirham', 'fr' => 'Dirham des Émirats', 'ar' => 'الدرهم الإماراتي'],
            ],
            [
                'code' => 'MXN', 'symbol' => '$', 'exchange_rate' => 17.25, 'country_code' => 'MEX',
                'translations' => ['en' => 'Mexican Peso', 'fr' => 'Peso mexicain', 'ar' => 'البيزو المكسيكي'],
            ],
            [
                'code' => 'ZAR', 'symbol' => 'R', 'exchange_rate' => 18.20, 'country_code' => 'ZAF',
                'translations' => ['en' => 'South African Rand', 'fr' => 'Rand sud-africain', 'ar' => 'الراند الجنوب أفريقي'],
            ],
            [
                'code' => 'TRY', 'symbol' => '₺', 'exchange_rate' => 27.35, 'country_code' => 'TUR',
                'translations' => ['en' => 'Turkish Lira', 'fr' => 'Livre turque', 'ar' => 'الليرة التركية'],
            ],
            [
                'code' => 'SGD', 'symbol' => 'S$', 'exchange_rate' => 1.35, 'country_code' => 'SGP',
                'translations' => ['en' => 'Singapore Dollar', 'fr' => 'Dollar de Singapour', 'ar' => 'دولار سنغافوري'],
            ],
            [
                'code' => 'HKD', 'symbol' => 'HK$', 'exchange_rate' => 7.85, 'country_code' => 'HKG',
                'translations' => ['en' => 'Hong Kong Dollar', 'fr' => 'Dollar de Hong Kong', 'ar' => 'دولار هونغ كونغ'],
            ],
            [
                'code' => 'KRW', 'symbol' => '₩', 'exchange_rate' => 1320.50, 'country_code' => 'KOR',
                'translations' => ['en' => 'South Korean Won', 'fr' => 'Won sud-coréen', 'ar' => 'الوون الكوري الجنوبي'],
            ],
            [
                'code' => 'EGP', 'symbol' => '£', 'exchange_rate' => 30.90, 'country_code' => 'EGY',
                'translations' => ['en' => 'Egyptian Pound', 'fr' => 'Livre égyptienne', 'ar' => 'الجنيه المصري'],
            ],
        ];

        foreach ($currencies as $data) {
            $currency = Currency::updateOrCreate(['code' => $data['code']], [
                'symbol' => $data['symbol'],
                'exchange_rate' => $data['exchange_rate'],
            ]);

            foreach ($data['translations'] as $locale => $name) {
                $currency->translateOrNew($locale)->name = $name;
            }

            $currency->save();
        }
    }
}
