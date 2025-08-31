<?php

namespace App\Models\Sections;

use Illuminate\Database\Eloquent\Model;

class HeroSectionTitles extends Model
{
    //
    protected $table = 'hero_section_titles';
    protected $fillable = ['id', 'title'];
}
