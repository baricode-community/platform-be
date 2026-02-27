<?php

namespace App\Filament\Resources\Courses;

use App\Filament\Resources\Courses\LessonResource\Pages\CreateLesson;
use App\Filament\Resources\Courses\LessonResource\Pages\EditLesson;
use App\Filament\Resources\Courses\LessonResource\Pages\ListLessons;
use App\Filament\Resources\Courses\LessonResource\Schemas\LessonForm;
use App\Filament\Resources\Courses\LessonResource\Tables\LessonTable;
use App\Models\LMS\Lesson;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    public static function form(Schema $schema): Schema
    {
        return LessonForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LessonTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLessons::route('/'),
            'create' => CreateLesson::route('/create'),
            'edit' => EditLesson::route('/{record}/edit'),
        ];
    }
}

