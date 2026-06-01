<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

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
                            ->afterStateUpdated(
                                fn ($state, callable $set) => $set('slug', Str::slug($state))
                            ),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('category')
                            ->required(),

                        Forms\Components\Textarea::make('short_description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\Textarea::make('background')
                            ->rows(6),

                        Forms\Components\Textarea::make('objective')
                            ->rows(6),

                        Forms\Components\Textarea::make('features')
                            ->rows(6),
                    ]),

                Forms\Components\Section::make('Technical')
                    ->schema([
                        Forms\Components\Textarea::make('tech_stack')
                            ->rows(6),

                        Forms\Components\Textarea::make('database_design')
                            ->rows(6),

                        Forms\Components\Textarea::make('flowchart_desc')
                            ->rows(6),
                    ]),

                Forms\Components\Section::make('Documentation')
                    ->schema([
                        Forms\Components\Textarea::make('documentation')
                            ->rows(6),

                        Forms\Components\Textarea::make('conclusion')
                            ->rows(6),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\TextInput::make('tags')
                            ->helperText('Pisahkan dengan koma (,)'),

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
                    ]),

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