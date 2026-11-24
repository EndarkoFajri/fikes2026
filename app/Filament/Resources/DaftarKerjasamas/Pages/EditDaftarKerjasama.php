<?php

namespace App\Filament\Resources\DaftarKerjasamas\Pages;

use App\Filament\Resources\DaftarKerjasamas\DaftarKerjasamaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDaftarKerjasama extends EditRecord
{
    protected static string $resource = DaftarKerjasamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
