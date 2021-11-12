<?php

namespace Soap\Ami\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Soap\Ami\AmiServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Soap\\Ami\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            AmiServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-ami_table.php.stub';
        $migration->up();
        */
    }
}
