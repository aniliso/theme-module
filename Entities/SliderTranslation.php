<?php

namespace Modules\Theme\Entities;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'sub_title', 'content', 'link_title', 'url', 'uri', 'target'];
    protected $table = 'theme__slider_translations';
}
