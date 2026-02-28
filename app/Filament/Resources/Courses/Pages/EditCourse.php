<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use App\Filament\Resources\Courses\Actions\ExportCourseAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Edit Course: ' . $this->record->title;
    }

    protected function getHeaderActions(): array
    {
        return [
            ExportCourseAction::make('export'),
            DeleteAction::make(),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            // Relation managers for nested resources
        ];
    }
}

