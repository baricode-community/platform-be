<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Title'),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->label('Slug'),
                        Textarea::make('excerpt')
                            ->maxLength(500)
                            ->rows(3)
                            ->label('Excerpt'),
                    ]),

                Section::make('Content')
                    ->collapsible()
                    ->schema([
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->label('Content'),
                    ]),

                Section::make('Media')
                    ->collapsible()
                    ->schema([
                        FileUpload::make('featured_image')
                            ->image()
                            ->directory('blog-featured-images')
                            ->label('Featured Image'),
                    ]),

                Section::make('Metadata')
                    ->collapsible()
                    ->schema([
                        Select::make('author_id')
                            ->relationship('author', 'name')
                            ->required()
                            ->searchable()
                            ->label('Author'),
                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->label('Categories'),
                        Select::make('tags')
                            ->relationship('tags', 'name')
                            ->multiple()
                            ->preload()
                            ->label('Tags'),
                        Toggle::make('is_published')
                            ->label('Published'),
                    ]),
            ]);
    }
}
