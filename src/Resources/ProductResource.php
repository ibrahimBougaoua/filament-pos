<?php

namespace IbrahimBougaoua\FilamentPos\Resources;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use IbrahimBougaoua\FilamentPos\Models\Brand;
use IbrahimBougaoua\FilamentPos\Models\Category;
use IbrahimBougaoua\FilamentPos\Models\Product;
use IbrahimBougaoua\FilamentPos\Models\Unit;
use IbrahimBougaoua\FilamentPos\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make('name')->label('Name')->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            })
                            ->columnSpan([
                                'md' => 6,
                            ]),
                        TextInput::make('slug')->label('Slug')
                            ->required()
                            ->disabled()
                            ->columnSpan([
                                'md' => 6,
                            ]),
                        TextInput::make('sku')->label('Sku')
                            ->required()
                            ->columnSpan([
                                'md' => 6,
                            ]),
                        Select::make('status')->label('Status')
                            ->options([
                                '1' => 'Active',
                                '0' => 'Inactive',
                            ])
                            ->default('1')
                            ->disablePlaceholderSelection()
                            ->columnSpan([
                                'md' => 6,
                            ]),
                        MarkdownEditor::make('description')->label('Description')
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Select::make('cate_id')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->columnSpan([
                                        'md' => 6,
                                    ]),
                            ])
                            ->createOptionUsing(function ($data) {
                                $cate = Category::create([
                                    'name' => $data['name'],
                                    'slug' => Str::slug($data['name']),
                                ]);

                                return $cate->id;
                            })
                            ->label('Category')
                            ->options(Category::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->columnSpan([
                                'md' => 4,
                            ]),
                        Select::make('brand_id')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->columnSpan([
                                        'md' => 6,
                                    ]),
                            ])
                            ->createOptionUsing(function ($data) {
                                $brand = Brand::create([
                                    'name' => $data['name'],
                                    'slug' => Str::slug($data['name']),
                                ]);

                                return $brand->id;
                            })
                            ->label('Brand')
                            ->options(Brand::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->columnSpan([
                                'md' => 4,
                            ]),
                        Select::make('unit_id')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->columnSpan([
                                        'md' => 6,
                                    ]),
                            ])
                            ->createOptionUsing(function ($data) {
                                $unit = Unit::create([
                                    'name' => $data['name'],
                                    'slug' => Str::slug($data['name']),
                                ]);

                                return $unit->id;
                            })
                            ->label('Unit')
                            ->options(Unit::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->columnSpan([
                                'md' => 4,
                            ]),
                        FileUpload::make('image')->label('Image')
                            ->columnSpan([
                                'md' => 12,
                            ]),
                    ])
                    ->columns([
                        'md' => 12,
                    ])
                    ->columnSpan('full'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('variations'),
                        Repeater::make('variations')
                            ->relationship()
                            ->schema([
                                TextInput::make('sku')
                                    ->label('sku')
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                TextInput::make('value')
                                    ->label('value')
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                TextInput::make('default_purchase_price')
                                    ->label('default_purchase_price')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                TextInput::make('dpp_inc_tax')
                                    ->label('dpp_inc_tax')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                TextInput::make('profit_percent')
                                    ->label('profit_percent')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                TextInput::make('default_sell_price')
                                    ->label('default_sell_price')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                TextInput::make('sell_price_inc_tax')
                                    ->label('sell_price_inc_tax')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                                FileUpload::make('image')->label('Image')
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                            ])
                            ->columns([
                                'md' => 12,
                            ]),
                    ])
                    ->columnSpan('full'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Image')->defaultImageUrl(url('/assets/img/product.svg'))->circular(),
                TextColumn::make('name')->label('Name')
                    ->icon('heroicon-o-document-text')->sortable()->searchable(),
                TextColumn::make('slug')->label('Slug')->limit(20)->sortable()->searchable(),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('brand.name')->label('Brand'),
                TextColumn::make('unit.name')->label('Unit'),
                IconColumn::make('status')
                    ->label(__('panel.status'))->boolean()
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
                TextColumn::make('created_at')->label('Created at'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ]),
                Filter::make('created_at')
                    ->label(__('panel.created_at'))->form([
                    Forms\Components\DatePicker::make('created_from')->label('Created from'),
                    Forms\Components\DatePicker::make('created_until')->label('Created until'),
                ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                //Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                //]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
