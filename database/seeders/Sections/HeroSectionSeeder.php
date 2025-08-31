<?php

namespace Database\Seeders\Sections;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero_sections')->insert([
            'image_path' => 'https://instagram.fcai27-1.fna.fbcdn.net/v/t51.29350-15/242102680_344168697501107_6591096830684073607_n.jpg?stp=dst-jpg_e35_tt6&efg=eyJ2ZW5jb2RlX3RhZyI6IkZFRUQuaW1hZ2VfdXJsZ2VuLjEwODB4MTA4MC5zZHIuZjI5MzUwLmRlZmF1bHRfaW1hZ2UuZXhwZXJpbWVudGFsIn0&_nc_ht=instagram.fcai27-1.fna.fbcdn.net&_nc_cat=111&_nc_oc=Q6cZ2QErq5uzaZaHfH-SbhT8dg4bsB5gWOlxmUiFL5b_1uc8Bq-q8AoKpKBM_XDx1Z-vVZE&_nc_ohc=7gJ7cAmwrS0Q7kNvwH1FEAs&_nc_gid=Y3jFRY0HJnE0MtWzQ7xTLQ&edm=APoiHPcBAAAA&ccb=7-5&ig_cache_key=MjY2NDA2NTQzODU3NTUwNjM2NA%3D%3D.3-ccb7-5&oh=00_AfVtHUNAHHkct6TlNilD9qOAy96nKlSpH-3oFT68ERD86w&oe=68B2BAF0&_nc_sid=22de04',
            'titles' => json_encode(['I’m Simon,', 'Visual Artist & UI/UX designer.']),
            'descriptions' => json_encode([
                'I’m a freelance product designer based in London.',
                'I’m very passionate about the work that I do.'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
