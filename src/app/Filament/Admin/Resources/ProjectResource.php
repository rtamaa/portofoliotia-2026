<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationGroup = 'Portfolio';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Basic Info')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('slug', \Illuminate\Support\Str::slug($state))
                        ),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('category')
                        ->required(),

                    Forms\Components\Textarea::make('short_description')
                        ->rows(3),
                ])
                ->columns(2),

            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\RichEditor::make('background'),
                    Forms\Components\RichEditor::make('objective'),
                    Forms\Components\RichEditor::make('features'),
                ])
                ->columns(1),

            Forms\Components\Section::make('Technical')
                ->schema([
                    Forms\Components\RichEditor::make('tech_stack'),
                    Forms\Components\RichEditor::make('database_design'),
                    Forms\Components\RichEditor::make('flowchart_desc'),
                ])
                ->columns(1),

            Forms\Components\Section::make('Documentation')
                ->schema([
                    Forms\Components\RichEditor::make('documentation'),
                    Forms\Components\RichEditor::make('conclusion'),
                ])
                ->columns(1),

            Forms\Components\Section::make('Media')
                ->schema([
                    Forms\Components\TagsInput::make('tags'),

                    Forms\Components\FileUpload::make('thumbnail')
                        ->image()
                        ->disk('public')
                        ->directory('projects')
                        ->imageEditor(),

                    Forms\Components\FileUpload::make('erd')
                        ->image()
                        ->disk('public')
                        ->directory('projects/erd'),

                    Forms\Components\FileUpload::make('flowchart')
                        ->image()
                        ->disk('public')
                        ->directory('projects/flowcharts'),
                ])
                ->columns(1),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('thumbnail'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('category'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [

            'index' => Pages\ListProjects::route('/'),

            'create' => Pages\CreateProject::route('/create'),

            'edit' => Pages\EditProject::route('/{record}/edit'),

        ];
    }
}