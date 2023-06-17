<?php

namespace IbrahimBougaoua\FilamentPos;

use Filament\PluginServiceProvider;
use IbrahimBougaoua\FilamentPos\Commands\FilamentPosCommand;
use IbrahimBougaoua\FilamentPos\Resources\BrandResource;
use IbrahimBougaoua\FilamentPos\Resources\CategoryResource;
use IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource;
use IbrahimBougaoua\FilamentPos\Resources\VariationResource;
use IbrahimBougaoua\FilamentPos\Resources\UnitResource;
use Spatie\LaravelPackageTools\Package;

class FilamentPosServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        CategoryResource::class,
        UnitResource::class,
        BrandResource::class,
        PriceGroupResource::class,
        VariationResource::class,
    ];
    
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
            ->hasMigration('create_filament_pos_table')
            ->hasCommand(FilamentPosCommand::class);
    }
}
