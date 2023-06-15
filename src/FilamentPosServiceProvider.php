<?php

namespace IbrahimBougaoua\FilamentPos;

use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use IbrahimBougaoua\FilamentPos\Commands\FilamentPosCommand;
use IbrahimBougaoua\FilamentPos\Resources\CategoryResource;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPosServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        CategoryResource::class,
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
    
    protected function getUserMenuItems(): array
    {
        return [
            UserMenuItem::make()
                ->label('Sssss')
                //->url(route('filament.resources.categories.index'))
                ->icon('heroicon-s-cog'),
        ];
    }
}
