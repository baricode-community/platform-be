<?php

namespace App\Filament\Resources\Courses\LessonResource\Pages;

use App\Filament\Resources\Courses\LessonResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLesson extends CreateRecord
{
    protected static string $resource = LessonResource::class;

    public function mount(): void
    {
        parent::mount();

        // Pre-fill category_id from query parameter
        $categoryId = request()->query('category');
        if ($categoryId) {
            $this->form->fill([
                'category_id' => $categoryId,
            ]);
        }
    }
}
