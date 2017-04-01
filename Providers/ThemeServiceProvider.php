<?php

namespace Modules\Theme\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Media\Image\ThumbnailManager;
use Modules\Theme\Console\LanguagePublishCommand;
use Modules\Theme\Facades\SlideFacade;

class ThemeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->registerWidgets();
        $this->registerFacade();
        $this->registerCommands();
    }

    public function boot()
    {
        $this->publishConfig('theme', 'permissions');
        $this->publishConfig('theme', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        //$this->registerThumbnails();

        if(env('APP_KEY')) {
            $template = setting('core::template');
            $this->loadTranslationsFrom(base_path("Themes/{$template}/lang"), 'themes');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Theme\Repositories\SlideRepository',
            function () {
                $repository = new \Modules\Theme\Repositories\Eloquent\EloquentSlideRepository(new \Modules\Theme\Entities\Slide());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Theme\Repositories\Cache\CacheSlideDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Theme\Repositories\SliderRepository',
            function () {
                $repository = new \Modules\Theme\Repositories\Eloquent\EloquentSliderRepository(new \Modules\Theme\Entities\Slider());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Theme\Repositories\Cache\CacheSliderDecorator($repository);
            }
        );
    }

    private function registerThumbnails()
    {
        $this->app[ThumbnailManager::class]->registerThumbnail('sliderImage', [
            'fit' => [
                'width' => '1900',
                'height' => '600',
                'position' => 'center',
                'callback' => function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                },
            ]
        ]);

        $this->app[ThumbnailManager::class]->registerThumbnail('sliderThumb', [
            'fit' => [
                'width' => '100',
                'height' => '50',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
        ]);
    }

    private function registerWidgets()
    {
        \Widget::register('blogLatest', 'Modules\Theme\Widgets\BlogWidget@latest');
        \Widget::register('themeSlide', 'Modules\Theme\Widgets\SliderWidget@slide');
        \Widget::register('pageChildren', 'Modules\Theme\Widgets\PageWidget@children');
    }

    private function registerFacade()
    {
        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('Slide', SlideFacade::class);
    }

    private function registerCommands()
    {
        $this->commands([
            LanguagePublishCommand::class
        ]);
    }
}
