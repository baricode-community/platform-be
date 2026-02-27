<?php

namespace App\Filament\Resources\Courses\CategoryResource\Pages;

use App\Filament\Resources\Courses\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public function mount(): void
    {
        parent::mount();

        // Pre-fill course_id from query parameter
        $courseId = request()->query('course');
        if ($courseId) {
            $this->form->fill([
                'course_id' => $courseId,
            ]);
        }
    }
}
