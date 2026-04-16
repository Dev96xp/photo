<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class PhotoSessionSeeder extends Seeder
{
    public function run(): void
    {
        $sessionTemplates = [
            [
                ['name' => 'Session 1 - Exterior',       'type' => 'PORTRAIT',   'date' => '2026-05-10', 'time' => '09:00:00', 'location' => 'Downtown Studio', 'sort_order' => 1, 'status' => 'SCHEDULED', 'note' => 'Natural light preferred'],
                ['name' => 'Session 2 - Interior',       'type' => 'COMMERCIAL', 'date' => '2026-05-17', 'time' => '14:00:00', 'location' => 'Client Office',    'sort_order' => 2, 'status' => 'SCHEDULED', 'note' => 'Bring wide angle lens'],
            ],
            [
                ['name' => 'Session 1 - Family Portrait','type' => 'FAMILY',     'date' => '2026-05-12', 'time' => '10:00:00', 'location' => 'Central Park',     'sort_order' => 1, 'status' => 'COMPLETED', 'note' => 'Outdoor shoot'],
            ],
            [
                ['name' => 'Session 1 - Venue',          'type' => 'WEDDING',    'date' => '2026-06-01', 'time' => '11:00:00', 'location' => 'Grand Ballroom',   'sort_order' => 1, 'status' => 'SCHEDULED', 'note' => 'Pre-wedding shoot'],
                ['name' => 'Session 2 - Ceremony',       'type' => 'WEDDING',    'date' => '2026-06-15', 'time' => '16:00:00', 'location' => 'St. Mary Church',  'sort_order' => 2, 'status' => 'SCHEDULED', 'note' => 'Full ceremony coverage'],
            ],
        ];

        $projects = Project::where('status', '!=', 'DELETED')->get();
        $i = 0;

        foreach ($projects as $project) {
            // Solo crea sessions si el proyecto no tiene ninguna aún
            if ($project->sessions()->count() > 0) {
                continue;
            }

            $template = $sessionTemplates[$i % count($sessionTemplates)];

            foreach ($template as $data) {
                $project->sessions()->create($data);
            }

            $i++;
        }
    }
}
