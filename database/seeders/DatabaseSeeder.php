<?php

namespace Database\Seeders;

use App\Models\Sections\HeroSectionDescriptions;
use App\Models\Sections\HeroSectionImagePath;
use App\Models\Sections\HeroSectionTitles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Sections\HeroSectionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(HeroSectionSeeder::class);

        HeroSectionDescriptions::insert([
            [
                'description' => 'I’m a freelance product designer based in London.'
            ],
            [
                'description' => 'I’m very passionate about the work that I do.'
            ],
        ]);

        HeroSectionImagePath::create([
            'image_path' => 'https://ali-el-shoraa.netlify.app/imgs/ali-eui1.jpg'
        ]);

        HeroSectionTitles::insert([
            [
                'title' => 'I’m Simon,'
            ],
            [
                'title' => 'Visual Artist & UI/UX designer.'
            ],
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
