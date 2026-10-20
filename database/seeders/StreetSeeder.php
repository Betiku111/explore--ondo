<?php

namespace Database\Seeders;

use App\Models\Street;
use Illuminate\Database\Seeder;

class StreetSeeder extends Seeder
{
    public function run(): void
    {
        $streets = [
            ['name' => 'Yaba',          'location' => 'Akure South', 'description' => 'A bustling commercial hub with a vibrant market scene.'],
            ['name' => 'Holytrinity',   'location' => 'Akure North', 'description' => 'A serene residential area anchored by the historic Holy Trinity Cathedral.'],
            ['name' => 'Ojojo',         'location' => 'Akure South', 'description' => 'A culturally rich street where traditional Yoruba heritage meets modern living.'],
            ['name' => 'Temidayo',      'location' => 'Akure',       'description' => 'A lively residential street with a strong sense of community.'],
            ['name' => 'Ijoka',         'location' => 'Akure South', 'description' => 'A key arterial road connecting neighborhoods and driving commerce.'],
            ['name' => 'Surulere',      'location' => 'Akure',       'description' => 'A quiet street whose name means "patience is rewarding".'],
            ['name' => 'Akinjagular',   'location' => 'Akure',       'description' => 'A storied street steeped in local history.'],
            ['name' => 'Losunla',       'location' => 'Ondo West',   'description' => 'A vibrant street in the heart of Ondo town.'],
            ['name' => 'Ajiboro',       'location' => 'Ondo',        'description' => 'A charming street where traditional architecture meets everyday commerce.'],
            ['name' => 'Lotogbe Lay 1', 'location' => 'Ondo',        'description' => 'A planned residential street offering structure and community living.'],
            ['name' => 'Lotogbe Lay 2', 'location' => 'Ondo',        'description' => 'The second phase of the Lotogbe layout.'],
        ];

        foreach ($streets as $index => $data) {
            Street::updateOrCreate(
                ['name' => $data['name']],
                [
                    'name'        => $data['name'],
                    'location'    => $data['location'],
                    'description' => $data['description'],
                    'image'       => null,
                    'is_popular'  => $index < 5,   // first 5 popular
                ]
            );
        }
    }
}