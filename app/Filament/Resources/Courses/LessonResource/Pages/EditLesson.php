<?php

namespace App\Filament\Resources\Courses\LessonResource\Pages;

use App\Filament\Resources\Courses\LessonResource;
use Filament\Resources\Pages\EditRecord;

class EditLesson extends EditRecord
{
    protected static string $resource = LessonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\DeleteAction::make(),
        ];
    }
}
