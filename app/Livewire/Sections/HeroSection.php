<?php

namespace App\Livewire\Sections;

// use App\Http\Resources\Sections\HeroSection as SectionsHeroSection;
use App\Models\Sections\HeroSectionTitles;
use Livewire\Component;
// use App\Models\Sections\HeroSection as HeroSectionModel;
use App\Models\Sections\HeroSectionDescriptions;
use App\Models\Sections\HeroSectionImagePath;

class HeroSection extends Component
{
    public $heroSections;

    public function mount()
    {

        $this->heroSections = [
            'imagePath' => HeroSectionImagePath::pluck('image_path')->first() ?? null,
            'titles' => HeroSectionTitles::pluck('title') ?? null,
            'descriptions' => HeroSectionDescriptions::pluck('description') ?? null,
        ];
    }


    public function render()
    {
        return view('components.sections.hero-section');
    }
}
