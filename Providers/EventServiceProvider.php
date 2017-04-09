<?php namespace Modules\Theme\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Media\Events\Handlers\HandleMediaStorage;
use Modules\Media\Events\Handlers\RemovePolymorphicLink;
use Modules\Theme\Events\Slider\SliderWasCreated;
use Modules\Theme\Events\Slider\SliderWasDeleted;
use Modules\Theme\Events\Slider\SliderWasUpdated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
      SliderWasUpdated::class => [
          HandleMediaStorage::class
      ],
      SliderWasCreated::class => [
          HandleMediaStorage::class
      ],
      SliderWasDeleted::class => [
          RemovePolymorphicLink::class
      ]
    ];
}