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

        // Templates data
        $templates = [
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
            $template = Template::create([
                'name' => $templateData['name'],
                'view_path' => $templateData['view_path'],
            ]);

            // Attach plans to template (attach all plans for demo)
            $template->plans()->attach($plans->pluck('id'));
        }
    }
}
