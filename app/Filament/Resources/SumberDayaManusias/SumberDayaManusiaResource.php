<?php

namespace App\Filament\Resources\SumberDayaManusias;

use App\Filament\Resources\SumberDayaManusias\Pages\CreateSumberDayaManusia;
use App\Filament\Resources\SumberDayaManusias\Pages\EditSumberDayaManusia;
use App\Filament\Resources\SumberDayaManusias\Pages\ListSumberDayaManusias;
use App\Filament\Resources\SumberDayaManusias\Schemas\SumberDayaManusiaForm;
use App\Filament\Resources\SumberDayaManusias\Tables\SumberDayaManusiasTable;
use App\Models\SumberDayaManusia;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class SumberDayaManusiaResource extends Resource
{
    protected static ?string $model = SumberDayaManusia::class;
protected static string|UnitEnum|null $navigationGroup = 'PROFIL';
protected static ?string $navigationLabel = 'Sumber Daya Manusia';
protected static ?string $modelLabel = 'Sumber Daya Manusia';
protected static ?string $pluralModelLabel = 'Sumber Daya Manusia';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SDM';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
                Forms\Components\TextInput::make('judul')
                ->label('Judul Dokumen')
                ->default('Data Sumber Daya Manusia FIKES UDS')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('keterangan')
                ->label('Keterangan / Periode')
                ->placeholder('Contoh: Semester Ganjil 2025/2026')
                ->maxLength(100)
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('file_pdf')
                ->label('File Dokumen SDM (PDF)')
                ->acceptedFileTypes(['application/pdf'])
                ->disk('public')
                ->directory('dokumen-sdm')
                ->visibility('public')
                ->maxSize(20480) // Maksimal 20 MB
                ->required()
                ->columnSpanFull(),

            Forms\Components\Toggle::make('is_aktif')
                ->label('Tampilkan di Website')
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                ->label('Judul Dokumen')
                ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                ->label('Keterangan')
                ->placeholder('-'),
                Tables\Columns\IconColumn::make('is_aktif')
                ->label('Aktif')
                ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Diperbarui')->dateTime('d M Y'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSumberDayaManusias::route('/'),
            'create' => CreateSumberDayaManusia::route('/create'),
            'edit' => EditSumberDayaManusia::route('/{record}/edit'),
        ];
    }
}
