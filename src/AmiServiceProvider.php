<?php

namespace Soap\Ami;

use Soap\Ami\Commands\AmiCliCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasCommand(AmiCliCommand::class);
    }
}
