<?php

namespace App\Filament\Resources\Courses\LessonResource\Pages;

use App\Filament\Resources\Courses\LessonResource;
use Filament\Resources\Pages\ListRecords;

class ListLessons extends ListRecords
{
    protected static string $resource = LessonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
