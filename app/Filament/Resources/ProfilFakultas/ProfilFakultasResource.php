<?php

namespace App\Filament\Resources\ProfilFakultas;

use App\Filament\Resources\ProfilFakultas\Pages\CreateProfilFakultas;
use App\Filament\Resources\ProfilFakultas\Pages\EditProfilFakultas;
use App\Filament\Resources\ProfilFakultas\Pages\ListProfilFakultas;
use App\Filament\Resources\ProfilFakultas\Schemas\ProfilFakultasForm;
use App\Filament\Resources\ProfilFakultas\Tables\ProfilFakultasTable;
use App\Models\ProfilFakultas;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class ProfilFakultasResource extends Resource
{
    protected static ?string $model = ProfilFakultas::class;
      protected static string|UnitEnum|null $navigationGroup = 'Fakultas';
protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama_dekan')
                    ->label('Nama Lengkap Dekan')
                    ->required()
                    ->placeholder('Contoh: Fany Anitasari'),

                Forms\Components\TextInput::make('gelar_dekan')
                    ->label('Gelar Akademik')
                    ->placeholder('Contoh: S.Kep., Ns., M.Kep.'),

                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->default('Dekan Fakultas Ilmu Kesehatan')
                    ->required(),

                Forms\Components\FileUpload::make('foto_dekan')
                    ->label('Foto Resmi Dekan')
                    ->image()
                    ->disk('public')
                    ->directory('pimpinan')
                    ->visibility('public')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('slogan_badge')
                    ->label('Judul Kotak Slogan')
                    ->default('Pelayanan & Karakter Unggul'),

                Forms\Components\Textarea::make('kutipan_dekan')
                    ->label('Pesan Singkat / Sambutan Dekan')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_dekan')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama_dekan')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gelar_dekan')
                    ->label('Gelar'),
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
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
            'index' => ListProfilFakultas::route('/'),
            'create' => CreateProfilFakultas::route('/create'),
            'edit' => EditProfilFakultas::route('/{record}/edit'),
        ];
    }
}
