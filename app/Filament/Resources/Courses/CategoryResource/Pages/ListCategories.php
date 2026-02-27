<?php

namespace App\Filament\Resources\Courses\CategoryResource\Pages;

use App\Filament\Resources\Courses\CategoryResource;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

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
        $courseId = request()->query('course');
        
        if ($courseId) {
            $url .= '?course=' . $courseId;
        }
        
        return $url;
    }
}
