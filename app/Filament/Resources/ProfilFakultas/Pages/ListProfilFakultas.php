<?php

namespace App\Filament\Resources\ProfilFakultas\Pages;

use App\Filament\Resources\ProfilFakultas\ProfilFakultasResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilFakultas extends ListRecords
{
    protected static string $resource = ProfilFakultasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
