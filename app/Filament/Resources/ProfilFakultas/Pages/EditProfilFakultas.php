<?php

namespace App\Filament\Resources\ProfilFakultas\Pages;

use App\Filament\Resources\ProfilFakultas\ProfilFakultasResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilFakultas extends EditRecord
{
    protected static string $resource = ProfilFakultasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
