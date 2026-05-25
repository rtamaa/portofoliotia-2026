<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\StatsResource\Pages;
use App\Models\Stats;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class StatsResource extends Resource
{
    protected static ?string $model = Stats::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Stats';

    protected static ?string $pluralLabel = 'Stats';

    protected static ?string $modelLabel = 'Stat';

    // =====================
    // FORM
    // =====================
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->label('Title (e.g Projects, Years, Clients)'),

            TextInput::make('value')
                ->required()
                ->maxLength(50)
                ->label('Value (e.g 50+, 3+, 120+)'),

            TextInput::make('icon')
                ->nullable()
                ->maxLength(255)
                ->label('Icon (optional)'),

            TextInput::make('sort')
                ->numeric()
                ->default(0)
                ->label('Sort Order'),

            Toggle::make('is_active')
                ->default(true)
                ->label('Active'),
        ]);
    }

    // =====================
    // TABLE
    // =====================
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('value')
                    ->label('Value'),

                TextColumn::make('sort')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // =====================
    // RELATIONS
    // =====================
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // =====================
    // PAGES
    // =====================
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStats::route('/'),
            'create' => Pages\CreateStats::route('/create'),
            'edit' => Pages\EditStats::route('/{record}/edit'),
        ];
    }
}