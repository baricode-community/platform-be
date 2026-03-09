<?php

namespace App\Filament\AdminLms\Resources\LessonResource\Pages;

use App\Filament\AdminLms\Resources\LessonResource;
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
