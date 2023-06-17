<?php

namespace IbrahimBougaoua\FilamentPos\Resources;

use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use IbrahimBougaoua\FilamentPos\Models\Variation;
use IbrahimBougaoua\FilamentPos\Resources\VariationResource\Pages;
use Illuminate\Database\Eloquent\Builder;

class VariationResource extends Resource
{
    protected static ?string $model = Variation::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Repeater::make('values')
                            ->relationship('values')
                            ->schema([
                                Forms\Components\Card::make()
                                    ->schema([
                                        TextInput::make('value')
                                            ->label('Value')
                                            ->required()
                                            ->columnSpan([
                                                'md' => 12,
                                            ]),
                                    ])
                                    ->columns([
                                        'md' => 12,
                                    ])
                                    ->columnSpan('full'),
                            ])
                            ->columns([
                                'md' => 12,
                            ])
                            ->columnSpan('full'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->icon('heroicon-o-document-text')->sortable()->searchable(),
                TextColumn::make('values.value'),
                TextColumn::make('created_at')->label('Created At'),
            ])
            ->filters([
                Filter::make('created_at')
                    ->label('Created At')->form([
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListVariations::route('/'),
        ];
    }
}
