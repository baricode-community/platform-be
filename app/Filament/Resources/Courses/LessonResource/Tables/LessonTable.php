<?php

namespace App\Filament\Resources\Courses\LessonResource\Tables;

use App\Filament\Resources\Courses\CategoryResource;
use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LessonTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.course.title')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.title')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('duration')
                    ->sortable()
                    ->suffix(' min'),
                TextColumn::make('order')
                    ->sortable(),
                IconColumn::make('is_published')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('view_course')
                    ->label('Course')
                    ->icon('heroicon-o-book-open')
                    ->url(function ($record) {
                        return CourseResource::getUrl('edit', ['record' => $record->category->course_id]);
                    }),
                Action::make('view_category')
                    ->label('Category')
                    ->icon('heroicon-o-tag')
                    ->url(function ($record) {
                        return CategoryResource::getUrl('edit', ['record' => $record->category_id]);
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
