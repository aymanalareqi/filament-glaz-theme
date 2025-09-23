<?php

namespace Alareqi\FilamentGlazTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class FilamentGlazThemePlugin implements Plugin
{
    public static function make(): static
    {
        return new static;
    }

    public function getId(): string
    {
        return 'filament-glaz-theme';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->font('tajawal')
            ->viteTheme('vendor/alareqi/filament-glaz-theme/resources/css/theme.css');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
