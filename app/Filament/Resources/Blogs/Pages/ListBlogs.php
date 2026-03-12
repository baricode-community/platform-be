<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use Filament\Actions\CreateAction;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListBlogs extends ListRecords
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
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
}
