<?php

namespace App\Filament\Resources\RencanaPengembangans;

use App\Filament\Resources\RencanaPengembangans\Pages\CreateRencanaPengembangan;
use App\Filament\Resources\RencanaPengembangans\Pages\EditRencanaPengembangan;
use App\Filament\Resources\RencanaPengembangans\Pages\ListRencanaPengembangans;
use App\Filament\Resources\RencanaPengembangans\Schemas\RencanaPengembanganForm;
use App\Filament\Resources\RencanaPengembangans\Tables\RencanaPengembangansTable;
use App\Models\RencanaPengembangan;
use BackedEnum;
use UnitEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;

class RencanaPengembanganResource extends Resource
{
    protected static ?string $model = RencanaPengembangan::class;
    protected static string|UnitEnum|null $navigationGroup = 'PROFIL';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'pengembangan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('kategori')
                    ->label('Jenis Dokumen')
                    ->options([
                        'renstra' => 'Rencana Strategis (Renstra)',
                        'renop' => 'Rencana Operasional (Renop)',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('periode')
                    ->label('Periode Tahun')
                    ->placeholder('Contoh: 2025 - 2029')
                    ->maxLength(50),

                Forms\Components\TextInput::make('judul')
                    ->label('Judul Dokumen')
                    ->placeholder('Contoh: Rencana Strategis FIKES Universitas dr. Soebandi')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('file_pdf')
                    ->label('File Dokumen (PDF)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('public')
                    ->directory('dokumen-rencana')
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
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === 'renstra' ? 'Renstra' : 'Renop')
                    ->color(fn (string $state): string => $state === 'renstra' ? 'danger' : 'info'),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('periode')
                    ->label('Periode')
                    ->placeholder('-'),

                Tables\Columns\IconColumn::make('is_aktif')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'renstra' => 'Rencana Strategis',
                        'renop' => 'Rencana Operasional',
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
           
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRencanaPengembangans::route('/'),
            'create' => CreateRencanaPengembangan::route('/create'),
            'edit' => EditRencanaPengembangan::route('/{record}/edit'),
        ];
    }
}
