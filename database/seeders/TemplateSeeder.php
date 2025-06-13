<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        // Get plans (make sure plans exist)
        $defaultPlan = Plan::first(); // You can improve to assign specific plans

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

        foreach ($templates as $template) {
            Template::create([
                'plan_id' => $defaultPlan->id,
                'name' => $template['name'],
                'view_path' => $template['view_path'],
            ]);
        }
    }
}
