<?php

namespace App\Filament\Resources\PengaturanKerjasamas\Pages;

use App\Filament\Resources\PengaturanKerjasamas\PengaturanKerjasamaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengaturanKerjasama extends EditRecord
{
    protected static string $resource = PengaturanKerjasamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
