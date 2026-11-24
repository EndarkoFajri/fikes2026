<?php

namespace App\Filament\Resources\RencanaPengembangans\Pages;

use App\Filament\Resources\RencanaPengembangans\RencanaPengembanganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRencanaPengembangans extends ListRecords
{
    protected static string $resource = RencanaPengembanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
