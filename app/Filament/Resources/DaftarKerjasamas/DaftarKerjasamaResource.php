<?php

namespace App\Filament\Resources\DaftarKerjasamas;

use App\Filament\Resources\DaftarKerjasamaResource\Pages\ListDaftarKerjasamas;
use App\Filament\Resources\DaftarKerjasamas\Pages\CreateDaftarKerjasama;
use App\Filament\Resources\DaftarKerjasamas\Pages\EditDaftarKerjasama;
use App\Filament\Resources\DaftarKerjasamas\Pages\ListDaftarKerjasama;
use App\Models\DaftarKerjasama;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class DaftarKerjasamaResource extends Resource
{
    protected static ?string $model = DaftarKerjasama::class;
    protected static string|UnitEnum|null $navigationGroup = 'PROFIL';
    protected static ?string $navigationLabel = 'Daftar Kerja Sama';
    protected static ?string $pluralModelLabel = 'Daftar Kerja Sama';
    protected static ?string $modelLabel = 'Daftar Kerja Sama';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'kerjasama';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
                Forms\Components\TextInput::make('nama_mitra')->label('Nama Instansi / Mitra')->required()->columnSpanFull(),
                Forms\Components\Select::make('tingkat')
                    ->label('Tingkat')
                    ->options([
                        'dalam_negeri' => 'Dalam Negeri',
                        'luar_negeri' => 'Luar Negeri',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('jenis_dokumen')->label('Jenis Dokumen')->placeholder('MoU / MoA / IA'),
                Forms\Components\TextInput::make('bidang_kerjasama')->label('Bidang Kerja Sama')->columnSpanFull(),
                Forms\Components\TextInput::make('tahun_mulai')->label('Tahun Mulai')->placeholder('2025'),
                Forms\Components\TextInput::make('tahun_berakhir')->label('Tahun Berakhir')->placeholder('2028'),
                Forms\Components\Select::make('status')
                    ->options(['Aktif' => 'Aktif', 'Berakhir' => 'Berakhir'])
                    ->default('Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
       return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_mitra')->label('Nama Mitra')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tingkat')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => $state === 'dalam_negeri' ? 'Dalam Negeri' : 'Luar Negeri')
                    ->color(fn (string $state) => $state === 'dalam_negeri' ? 'success' : 'info'),
                Tables\Columns\TextColumn::make('jenis_dokumen')->label('Dokumen'),
                Tables\Columns\TextColumn::make('tahun_mulai')->label('Mulai'),
                Tables\Columns\TextColumn::make('tahun_berakhir')->label('Berakhir'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => $state === 'Aktif' ? 'success' : 'danger'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tingkat')->options([
                    'dalam_negeri' => 'Dalam Negeri',
                    'luar_negeri' => 'Luar Negeri',
                ]),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
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
            'index' => ListDaftarKerjasamas::route('/'),
            'create' => CreateDaftarKerjasama::route('/create'),
            'edit' => EditDaftarKerjasama::route('/{record}/edit'),
        ];
    }
}
