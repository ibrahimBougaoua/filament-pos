<?php

namespace IbrahimBougaoua\FilamentPos\Resources;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
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
use IbrahimBougaoua\FilamentPos\Models\Category;
use IbrahimBougaoua\FilamentPos\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

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
                                'md' => 12,
                            ]),
                        TextInput::make('slug')->label('Slug')
                            ->required()
                            ->disabled()
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        MarkdownEditor::make('description')->label('Description')
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Select::make('cate_id')
                            ->label(__('panel.patient'))
                            ->options(Category::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Select::make('status')->label('Status')
                            ->options([
                                '1' => 'Active',
                                '0' => 'Inactive',
                            ])->default('1')->disablePlaceholderSelection()
                            ->columnSpan([
                                'md' => 12,
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Image')->defaultImageUrl(url('/assets/img/category.svg'))->circular(),
                TextColumn::make('name')->label(__('panel.name'))
                    ->icon('heroicon-o-document-text')->sortable()->searchable(),
                TextColumn::make('slug')->label(__('panel.slug'))->limit(20)->sortable()->searchable(),
                TextColumn::make('category.name')->default('Parent')->label('Category'),
                IconColumn::make('status')
                    ->label(__('panel.status'))->boolean()
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
                TextColumn::make('created_at')->label(__('panel.created_at')),
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
            'index' => Pages\ListCategories::route('/'),
        ];
    }
}
