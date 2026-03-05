<?php

namespace App\Filament\Resources\BlogCategories;

use App\Filament\Resources\BlogCategories\Pages\CreateBlogCategory;
use App\Filament\Resources\BlogCategories\Pages\EditBlogCategory;
use App\Filament\Resources\BlogCategories\Pages\ListBlogCategories;
use App\Filament\Resources\BlogCategories\Schemas\BlogCategoryForm;
use App\Filament\Resources\BlogCategories\Tables\BlogCategoriesTable;
use App\Models\BlogCategory;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class BlogCategoryResource extends Resource
{
    protected static ?string $model = BlogCategory::class;

    protected static ?string $slug = 'blog-categories';

    protected static BackedEnum|string|null $navigationIcon = Heroicon::OutlinedFolderOpen;

    protected static UnitEnum|string|null $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BlogCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogCategoriesTable::configure($table);
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
            'index' => ListBlogCategories::route('/'),
            'create' => CreateBlogCategory::route('/create'),
            'edit' => EditBlogCategory::route('/{record}/edit'),
        ];
    }
}
