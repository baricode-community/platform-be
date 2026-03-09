<?php

namespace App\Filament\AdminLms\Resources\LessonResource\Pages;

use App\Filament\AdminLms\Resources\LessonResource;
use Filament\Resources\Pages\ListRecords;

class ListLessons extends ListRecords
{
    protected static string $resource = LessonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->url(fn () => $this->getCreateUrl()),
        ];
    }

    private function getCreateUrl(): string
    {
        $url = static::$resource::getUrl('create');
        $categoryId = request()->query('category');
        
        if ($categoryId) {
            $url .= '?category=' . $categoryId;
        }
        
        return $url;
    }
}
