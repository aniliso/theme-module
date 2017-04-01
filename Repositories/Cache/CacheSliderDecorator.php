<?php

namespace Modules\Theme\Repositories\Cache;

use Modules\Theme\Repositories\SliderRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSliderDecorator extends BaseCacheDecorator implements SliderRepository
{
    public function __construct(SliderRepository $slider)
    {
        parent::__construct();
        $this->entityName = 'theme.sliders';
        $this->repository = $slider;
    }
}
