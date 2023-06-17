<?php

namespace IbrahimBougaoua\FilamentPos\Resources;

use IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource\Pages;
use IbrahimBougaoua\FilamentPos\Models\PriceGroup;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class PriceGroupResource extends Resource
{
    protected static ?string $model = PriceGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Card::make()
            ->schema([
                TextInput::make('name')->label('Name')
                ->required()
                ->columnSpan([
                    'md' => 12,
                ]),
                MarkdownEditor::make('description')->label('Description')
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
                ])
            ])
            ->columns([
                'md' => 12
            ])
            ->columnSpan('full'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->icon('heroicon-o-document-text')->sortable()->searchable(),
                TextColumn::make('description')->label('Description'),
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
                })
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
            'index' => Pages\ListPriceGroups::route('/')
        ];
    }    
}
