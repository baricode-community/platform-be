<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('author.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('categories.name')
                    ->badge()
                    ->color('info'),
                TextColumn::make('tags.name')
                    ->badge()
                    ->color('secondary'),
                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Author'),
                SelectFilter::make('is_published')
                    ->options([
                        true => 'Published',
                        false => 'Draft',
                    ])
                    ->label('Status'),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('delete')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
