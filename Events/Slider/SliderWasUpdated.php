<?php

namespace Modules\Theme\Events\Slider;

use Modules\Theme\Entities\Slider;
use Modules\Media\Contracts\StoringMedia;

class SliderWasUpdated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Slider
     */
    public $slider;

    public function __construct(Slider $slider, array $data)
    {
        $this->data = $data;
        $this->slider = $slider;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->slider;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
