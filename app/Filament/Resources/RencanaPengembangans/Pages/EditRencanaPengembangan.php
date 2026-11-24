<?php

namespace App\Filament\Resources\RencanaPengembangans\Pages;

use App\Filament\Resources\RencanaPengembangans\RencanaPengembanganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRencanaPengembangan extends EditRecord
{
    protected static string $resource = RencanaPengembanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
