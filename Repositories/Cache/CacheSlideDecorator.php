<?php

namespace Modules\Theme\Repositories\Cache;

use Modules\Theme\Repositories\SlideRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSlideDecorator extends BaseCacheDecorator implements SlideRepository
{
    public function __construct(SlideRepository $slide)
    {
        parent::__construct();
        $this->entityName = 'theme.slides';
        $this->repository = $slide;
    }

    public function slides()
    {
        return $this->cache
            ->tags([$this->entityName, 'global'])
            ->remember("{$this->locale}.{$this->entityName}.slides", $this->cacheTime,
                function () {
                    return $this->repository->slides();
                }
            );
    }
}
