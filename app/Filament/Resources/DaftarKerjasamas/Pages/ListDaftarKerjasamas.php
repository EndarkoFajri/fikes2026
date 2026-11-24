<?php

namespace App\Filament\Resources\DaftarKerjasamaResource\Pages;

use App\Filament\Resources\DaftarKerjasamas\DaftarKerjasamaResource;
use App\Imports\DaftarKerjasamaImport;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ListDaftarKerjasamas extends ListRecords
{
    protected static string $resource = DaftarKerjasamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('importExcel')
                ->label('Import Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('success')
                ->form([
                    FileUpload::make('file')
                        ->label('File Excel (.xlsx / .xls / .csv)')
                        ->disk('local')
                        ->directory('temp-imports')
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                            'text/csv',
                        ])
                        ->required(),
                ])
                ->action(function (array $data) {
                    $filePath = Storage::disk('local')->path($data['file']);
                    Excel::import(new DaftarKerjasamaImport, $filePath);
                    Storage::disk('local')->delete($data['file']);

                    Notification::make()
                        ->title('Data kerja sama berhasil diimpor!')
                        ->success()
                        ->send();
                }),

            Actions\CreateAction::make(),
        ];
    }
}