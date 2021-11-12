<?php

namespace Soap\Ami;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Soap\Ami\Commands\AmiCommand;

class AmiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ami')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(AmiCommand::class);
    }
}
