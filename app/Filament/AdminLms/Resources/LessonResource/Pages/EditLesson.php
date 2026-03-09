<?php

namespace App\Filament\AdminLms\Resources\LessonResource\Pages;

use App\Filament\AdminLms\Resources\LessonResource;
use App\Filament\AdminLms\Resources\CourseResource;
use App\Filament\AdminLms\Resources\CategoryResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditLesson extends EditRecord
{
    protected static string $resource = LessonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_course')
                ->label('Course')
                ->icon('heroicon-o-book-open')
                ->url(CourseResource::getUrl('edit', ['record' => $this->record->category->course_id]))
                ->color('info'),
            Action::make('view_category')
                ->label('Category')
                ->icon('heroicon-o-tag')
                ->url(CategoryResource::getUrl('edit', ['record' => $this->record->category_id]))
                ->color('info'),
            \Filament\Actions\DeleteAction::make(),
        ];
    }
}
