<?php

namespace Maaz1n\FilamentIconToggleColumn\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Maaz1n\FilamentIconToggleColumn\FilamentIconToggleColumnServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Maaz1n\\FilamentIconToggleColumn\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentIconToggleColumnServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-icon-toggle-column_table.php.stub';
        $migration->up();
        */
    }
}
