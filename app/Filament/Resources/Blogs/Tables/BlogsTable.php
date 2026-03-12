<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(60),
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
                TextColumn::make('published_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->label('Publish Date')
                    ->placeholder('—'),
                TextColumn::make('views_count')
                    ->numeric()
                    ->sortable()
                    ->label('Views'),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                        '1' => 'Published',
                        '0' => 'Draft',
                    ])
                    ->label('Status'),
                SelectFilter::make('categories')
                    ->relationship('categories', 'name')
                    ->label('Category')
                    ->multiple()
                    ->preload(),
                Filter::make('scheduled')
                    ->label('Scheduled')
                    ->query(fn (Builder $query) => $query->where('is_published', true)->where('published_at', '>', now())),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
