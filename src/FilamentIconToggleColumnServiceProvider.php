<?php

namespace Maaz1n\FilamentIconToggleColumn;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentIconToggleColumnServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
           ->name('filament-icon-toggle-column')
           ->hasConfigFile()
           ->hasViews();
    }
}
