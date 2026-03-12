<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use App\Models\BlogCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ManageBlogCategories extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = BlogResource::class;

    public function getTitle(): string
    {
        return 'Blog Categories';
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            EmbeddedTable::make(),
        ]);
    }

    public function getSubNavigation(): array
    {
        return [
            NavigationItem::make('Posts')
                ->icon(Heroicon::OutlinedNewspaper)
                ->url(BlogResource::getUrl('index'))
                ->isActiveWhen(fn () => request()->url() === BlogResource::getUrl('index')),
            NavigationItem::make('Categories')
                ->icon(Heroicon::OutlinedFolderOpen)
                ->url(BlogResource::getUrl('categories'))
                ->isActiveWhen(fn () => request()->url() === BlogResource::getUrl('categories')),
            NavigationItem::make('Tags')
                ->icon(Heroicon::OutlinedTag)
                ->url(BlogResource::getUrl('tags'))
                ->isActiveWhen(fn () => request()->url() === BlogResource::getUrl('tags')),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->model(BlogCategory::class)
                ->form($this->getCategoryFormSchema()),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(BlogCategory::query())
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make()->form($this->getCategoryFormSchema()),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    private function getCategoryFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
            TextInput::make('slug')
                ->required()
                ->unique('blog_categories', 'slug', ignoreRecord: true)
                ->maxLength(255),
            Textarea::make('description')
                ->rows(3)
                ->maxLength(500),
        ];
    }
}
