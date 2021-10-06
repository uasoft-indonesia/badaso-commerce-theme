<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Providers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Uasoft\Badaso\Theme\CommerceTheme\BadasoCommerceTheme;
use Uasoft\Badaso\Theme\CommerceTheme\Commands\BadasoCommerceThemeSetup;
use Uasoft\Badaso\Theme\CommerceTheme\Facades\BadasoCommerceTheme as FacadesBadasoCommerceTheme;

class CommerceThemeProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $kernel = $this->app->make(Kernel::class);

        $loader = AliasLoader::getInstance();
        $loader->alias('BadasoCommerceTheme', FacadesBadasoCommerceTheme::class);

        $this->app->singleton('badaso-commerce-theme', function () {
            return new BadasoCommerceTheme();
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'commerce-theme');
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');

        $this->publishes([
            __DIR__.'/../Seeder' => database_path('seeders/Badaso/Commerce/Theme'),
            // __DIR__.'/../Config/badaso-commerce.php' => config_path('badaso-commerce.php'),
        ], 'BadasoCommerceTheme');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommands();
    }

    /**
     * Register the commands accessible from the Console.
     */
    private function registerConsoleCommands()
    {
        $this->commands(BadasoCommerceThemeSetup::class);
    }
}
