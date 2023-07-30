<?php

namespace IbrahimBougaoua\FilamentPos;

use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use IbrahimBougaoua\FilamentPos\Commands\FilamentPosCommand;
use IbrahimBougaoua\FilamentPos\Pages\PosPage;
use IbrahimBougaoua\FilamentPos\Resources\BrandResource;
use IbrahimBougaoua\FilamentPos\Resources\CategoryResource;
use IbrahimBougaoua\FilamentPos\Resources\CustomerResource;
use IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource;
use IbrahimBougaoua\FilamentPos\Resources\ProductResource;
use IbrahimBougaoua\FilamentPos\Resources\UnitResource;
use IbrahimBougaoua\FilamentPos\Resources\VariationResource;
use Spatie\LaravelPackageTools\Package;

class FilamentPosServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'pos-styles' => __DIR__.'/../dist/css/app.css',
    ];

    protected array $beforeCoreScripts = [
        'pos-scripts' => __DIR__.'/../dist/js/scripts.js',
        'pos-sweetalert2' => __DIR__.'/../dist/js/sweetalert2.js',
    ];

    protected array $resources = [
        CategoryResource::class,
        UnitResource::class,
        BrandResource::class,
        PriceGroupResource::class,
        VariationResource::class,
        ProductResource::class,
        CustomerResource::class,
    ];

    protected array $pages = [
        PosPage::class,
    ];

    protected function getUserMenuItems(): array
    {
        return [
            UserMenuItem::make()
                ->label('Pos')
                ->url(route('filament.pages.pos-page'))
                ->icon('heroicon-s-cog'),
        ];
    }

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
