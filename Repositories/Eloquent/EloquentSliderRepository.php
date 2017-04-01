<?php

namespace Modules\Theme\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Theme\Entities\Helpers\Status;
use Modules\Theme\Events\Slider\SliderWasCreated;
use Modules\Theme\Events\Slider\SliderWasDeleted;
use Modules\Theme\Events\Slider\SliderWasUpdated;
use Modules\Theme\Repositories\SliderRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentSliderRepository extends EloquentBaseRepository implements SliderRepository
{
    /**
     * Update a resource
     * @param $post
     * @param  array $data
     * @return mixed
     */
    public function update($model, $data)
    {
        $model->update($data);
        event(new SliderWasUpdated($model, $data));
        return $model;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Slider
     */
    public function create($data)
    {
        $model = $this->model->create($data);
        event(new SliderWasCreated($model, $data));
        return $model;
    }

    public function destroy($model)
    {
        event(new SliderWasDeleted($model->id, get_class($model)));
        return $model->delete();
    }

    public function allTranslatedIn($lang)
    {
        return $this->model->whereHas('translations', function(Builder $q) use ($lang) {
            $q->where('locale', "$lang");
        })->whereStatus(Status::PUBLISHED)->orderBy('ordering', 'asc')->get();
    }
}
