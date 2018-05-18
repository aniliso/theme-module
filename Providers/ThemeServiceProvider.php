<?php

namespace Modules\Theme\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Media\Image\ThumbnailManager;
use Modules\Theme\Composer\Backend\PositionComposer;
use Modules\Theme\Composer\Backend\ThemeAdminAssets;
use Modules\Theme\Console\LanguagePublishCommand;
use Modules\Theme\Events\Handlers\RegisterThemeSidebar;
use Modules\Theme\Facades\SlideFacade;

class ThemeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
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
        $this->app->extend('asgard.ModulesList', function($app) {
            array_push($app, 'theme');
            return $app;
        });

        $this->registerBindings();
        $this->registerWidgets();
        $this->registerFacade();
        $this->registerCommands();
        $this->registerPresenters();

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('theme', RegisterThemeSidebar::class)
        );

        view()->composer('theme::admin.sliders.*', PositionComposer::class);
        view()->composer(['theme::admin.sliders.edit', 'theme::admin.sliders.create'], ThemeAdminAssets::class);
    }

    public function boot()
    {
        $this->publishConfig('theme', 'config');
        $this->publishConfig('theme', 'permissions');
        $this->publishConfig('theme', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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

    private function registerPresenters()
    {
        if(env('APP_KEY')) {
            $template = setting('core::template');
            $this->loadTranslationsFrom(base_path("Themes/{$template}/lang"), 'themes');
            foreach (\File::glob(base_path("Themes/{$template}/presenter/*.php")) as $filename) {
                include_once ($filename);
            }
        }
    }
}
