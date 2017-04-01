<?php namespace Modules\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Theme\Repositories\SlideRepository;

class SlideFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SlideRepository::class;
    }
}