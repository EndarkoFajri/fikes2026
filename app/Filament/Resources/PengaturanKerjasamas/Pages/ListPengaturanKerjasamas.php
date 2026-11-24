<?php

namespace App\Filament\Resources\PengaturanKerjasamas\Pages;

use App\Filament\Resources\PengaturanKerjasamas\PengaturanKerjasamaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengaturanKerjasamas extends ListRecords
{
    protected static string $resource = PengaturanKerjasamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
