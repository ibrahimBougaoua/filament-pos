<?php

namespace IbrahimBougaoua\FilamentPos;

use IbrahimBougaoua\FilamentPos\Commands\FilamentPosCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPosServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-pos')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-pos_table')
            ->hasCommand(FilamentPosCommand::class);
    }
}
