<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        // Get all available plans (we'll attach all for demo)
        $plans = Plan::all();

        // Templates data (include the default layout as well)
        $templates = [
            [
                'name' => 'Default Layout',
                'view_path' => 'templates.default',
            ],
            [
                'name' => 'Invoice Template',
                'view_path' => 'templates.invoice',
            ],
            [
                'name' => 'Hackathon Invite',
                'view_path' => 'templates.hackathon_invite',
            ],
            [
                'name' => 'Event Reminder',
                'view_path' => 'templates.event_reminder',
            ],
            [
                'name' => 'General Announcement',
                'view_path' => 'templates.general_announcement',
            ],
        ];

        foreach ($templates as $templateData) {
            $template = Template::firstOrCreate(
                ['view_path' => $templateData['view_path']],
                ['name' => $templateData['name']]
            );

            // Attach all plans to the template (if not already attached)
            $template->plans()->syncWithoutDetaching($plans->pluck('id'));
        }
    }
}
