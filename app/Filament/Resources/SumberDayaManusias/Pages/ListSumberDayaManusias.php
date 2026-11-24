<?php

namespace App\Filament\Resources\SumberDayaManusias\Pages;

use App\Filament\Resources\SumberDayaManusias\SumberDayaManusiaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSumberDayaManusias extends ListRecords
{
    protected static string $resource = SumberDayaManusiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
