<?php

namespace Modules\Theme\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Theme\Entities\Helpers\Status;

class Slide extends Model
{
    protected $table = 'theme__slides';
    protected $fillable = ['name', 'slug', 'status'];

    public function sliders()
    {
        return $this->hasMany(Slider::class)
                    ->with(['files','translations'])
                    ->orderBy('ordering', 'asc');
    }

    public function scopeDraft(Builder $query)
    {
        return (bool) $query->whereStatus(Status::DRAFT);
    }

    public function scopePublished(Builder $query)
    {
        return (bool) $query->whereStatus(Status::PUBLISHED);
    }
}
