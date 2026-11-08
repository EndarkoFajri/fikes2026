<?php

namespace App\Filament\Resources\Dosens;

use App\Filament\Resources\Dosens\Pages\CreateDosen;
use App\Filament\Resources\Dosens\Pages\EditDosen;
use App\Filament\Resources\Dosens\Pages\ListDosens;
use App\Filament\Resources\Dosens\Schemas\DosenForm;
use App\Filament\Resources\Dosens\Tables\DosensTable;
use App\Models\Dosen;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;


class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;
    protected static string|UnitEnum|null $navigationGroup = 'Fakultas';
protected static ?int $navigationSort = 2;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Dosen';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
            Select::make('program_studi_id')
                ->relationship('programStudi', 'nama_prodi')
                ->required()
                ->searchable()
                ->preload(),
            TextInput::make('nama_lengkap')
                ->required()
                ->placeholder('Nama beserta gelar'),
            TextInput::make('nidn')
                ->label('NIDN')
                ->unique(ignoreRecord: true),
            TextInput::make('jabatan_akademik')
                ->placeholder('Contoh: Lektor / Asisten Ahli'),
            FileUpload::make('foto')
                ->image()
                ->directory('dosen')
                ->columnSpanFull(),
            ]);
        }

public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('foto')->circular(),
            TextColumn::make('nama_lengkap')->sortable()->searchable(),
            TextColumn::make('nidn')->label('NIDN')->searchable(),
            TextColumn::make('programStudi.nama_prodi')->sortable(),
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
            'index' => ListDosens::route('/'),
            'create' => CreateDosen::route('/create'),
            'edit' => EditDosen::route('/{record}/edit'),
        ];
    }
}
