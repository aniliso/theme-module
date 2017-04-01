<?php namespace Modules\Theme\Console;

use Illuminate\Console\Command;

class LanguagePublishCommand extends Command
{
    protected $name = 'theme:publish-translation';

    protected $description = 'Theme Publish Translations';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        if(\DB::connection()->getDatabaseName())
        {
            $template = setting('core::template');
            \File::deleteDirectory(resource_path('lang/themes'));
            if(\File::exists(base_path("Themes/{$template}/lang"))) {
                \File::copyDirectory(base_path("Themes/{$template}/lang"), resource_path('lang/themes'));
                $this->info('Theme Language files published');
            } else {
                $this->error('Theme language not found');
            }
        } else {
            $this->error("Please check database connection");
        }
    }
}