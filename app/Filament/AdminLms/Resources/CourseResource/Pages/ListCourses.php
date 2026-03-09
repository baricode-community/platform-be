<?php

namespace App\Filament\AdminLms\Resources\CourseResource\Pages;

use App\Filament\AdminLms\Resources\CourseResource;
use App\Filament\AdminLms\Resources\CourseResource\Actions\ImportCoursesAction;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportCoursesAction::make('import'),
            CreateAction::make(),
        ];
    }
}
