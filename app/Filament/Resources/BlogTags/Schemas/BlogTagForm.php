<?php

namespace App\Filament\Resources\BlogTags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BlogTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Tag Name'),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->label('Slug'),
            ]);
    }
}
