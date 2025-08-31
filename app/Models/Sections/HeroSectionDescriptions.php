<?php

namespace App\Models\Sections;

use Illuminate\Database\Eloquent\Model;

class HeroSectionDescriptions extends Model
{
    //
    protected $table = 'hero_section_descriptions';
    protected $fillable = ['id', 'description'];
}
