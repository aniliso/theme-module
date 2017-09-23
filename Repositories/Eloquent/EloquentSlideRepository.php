<?php

namespace Modules\Theme\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Theme\Entities\Helpers\Status;
use Modules\Theme\Repositories\SlideRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Theme\Repositories\SliderRepository;
use Carbon\Carbon;

class EloquentSlideRepository extends EloquentBaseRepository implements SlideRepository
{
    public function findBySlug($slug)
    {
        return $this->model
            ->where('slug', "$slug")
            ->whereHas('sliders', function (Builder $q) {
                $q->where('start_at', '<=', Carbon::now())
                  ->where('end_at', '>=', Carbon::now());
            })
            ->with('sliders')->whereStatus(Status::PUBLISHED)->first();
    }

    public function slides()
    {
        return $this->model->pluck('name', 'id')->toArray();
    }

    public function destroy($model)
    {
        foreach ($model->sliders as $slider) {
            app(SliderRepository::class)->destroy($slider);
        }
        return parent::destroy($model);
    }
}
