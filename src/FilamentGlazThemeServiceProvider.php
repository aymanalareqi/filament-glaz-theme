<?php

namespace Alareqi\FilamentGlazTheme;

use Illuminate\Support\ServiceProvider;

class FilamentGlazThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-glaz-theme.php', 'filament-glaz-theme');

        $this->publishes([
            __DIR__ . '/../config/filament-glaz-theme.php' => config_path('filament-glaz-theme.php'),
        ], 'filament-glaz-theme-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/filament-glaz-theme'),
        ], 'filament-glaz-theme-views');
    }

    public function boot(): void
    {
        //
    }
}
