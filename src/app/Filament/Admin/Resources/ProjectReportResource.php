<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectReportResource\Pages;
use App\Models\ProjectReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectReportResource extends Resource
{
    protected static ?string $model = ProjectReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->rows(3)
                ->required(),

            Forms\Components\RichEditor::make('problem_analysis')
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('requirements')
                ->columnSpanFull(),

            Forms\Components\Textarea::make('architecture')
                ->rows(3),

            Forms\Components\TagsInput::make('tech_stack')
                ->separator(','),

            Forms\Components\Textarea::make('erd_diagram')
                ->rows(12)
                ->columnSpanFull(),

            Forms\Components\Textarea::make('flowchart_diagram')
                ->rows(12)
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('features')
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('target_outputs')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectReports::route('/'),
            'create' => Pages\CreateProjectReport::route('/create'),
            'edit' => Pages\EditProjectReport::route('/{record}/edit'),
        ];
    }

    /**
     * ✅ BATASI HANYA 1 DATA REPORT
     */
    public static function canCreate(): bool
    {
        return ProjectReport::count() < 1;
    }
}