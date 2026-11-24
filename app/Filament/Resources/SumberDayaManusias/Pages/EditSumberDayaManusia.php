<?php

namespace App\Filament\Resources\SumberDayaManusias\Pages;

use App\Filament\Resources\SumberDayaManusias\SumberDayaManusiaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSumberDayaManusia extends EditRecord
{
    protected static string $resource = SumberDayaManusiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
