<?php

namespace App\Models\Sections;

use Illuminate\Database\Eloquent\Model;

class HeroSectionImagePath extends Model
{
    //
    protected $table = 'hero_section_image_path';
    protected $fillable = ['id', 'image_path'];
}
