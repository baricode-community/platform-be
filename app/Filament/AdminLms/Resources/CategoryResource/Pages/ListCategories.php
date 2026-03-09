<?php

namespace App\Filament\AdminLms\Resources\CategoryResource\Pages;

use App\Filament\AdminLms\Resources\CategoryResource;
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
