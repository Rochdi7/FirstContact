<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'max_templates' => 10,
                'ai_enabled' => true,
                'price' => 0,
                'translations' => [
                    'en' => [
                        'name' => 'Free Plan',
                        'features' => ['Basic Support', 'Up to 10 Templates'],
                    ],
                    'fr' => [
                        'name' => 'Plan Gratuit',
                        'features' => ['Support de base', 'Jusqu\'à 10 modèles'],
                    ],
                ]
            ],
            [
                'max_templates' => 50,
                'ai_enabled' => true,
                'price' => 29.99,
                'translations' => [
                    'en' => [
                        'name' => 'Pro Plan',
                        'features' => ['Priority Support', 'AI Enabled', 'Up to 50 Templates'],
                    ],
                    'fr' => [
                        'name' => 'Plan Pro',
                        'features' => ['Support prioritaire', 'IA activée', 'Jusqu\'à 50 modèles'],
                    ],
                ]
            ],
            [
                'max_templates' => 200,
                'ai_enabled' => true,
                'price' => 99.99,
                'translations' => [
                    'en' => [
                        'name' => 'Enterprise Plan',
                        'features' => ['Dedicated Support', 'AI Advanced', 'Up to 200 Templates'],
                    ],
                    'fr' => [
                        'name' => 'Plan Entreprise',
                        'features' => ['Support dédié', 'IA avancée', 'Jusqu\'à 200 modèles'],
                    ],
                ]
            ]
        ];

        foreach ($plans as $planData) {
            $plan = new Plan([
                'max_templates' => $planData['max_templates'],
                'ai_enabled' => $planData['ai_enabled'],
                'price' => $planData['price'],
            ]);

            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                if (!isset($planData['translations'][$localeCode])) {
                    continue; // skip if no translation provided for this locale
                }

                $features = $planData['translations'][$localeCode]['features'] ?? [];
                $plan->translateOrNew($localeCode)->name = $planData['translations'][$localeCode]['name'];
                $plan->translateOrNew($localeCode)->features = $features;
            }

            $plan->save();
        }
    }
}
