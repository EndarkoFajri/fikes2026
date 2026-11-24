<?php

namespace App\Filament\Resources\VisiMisis;

use App\Filament\Resources\VisiMisis\Pages\CreateVisiMisi;
use App\Filament\Resources\VisiMisis\Pages\EditVisiMisi;
use App\Filament\Resources\VisiMisis\Pages\ListVisiMisis;
use App\Filament\Resources\VisiMisis\Schemas\VisiMisiForm;
use App\Filament\Resources\VisiMisis\Tables\VisiMisisTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use UnitEnum;

class VisiMisiResource extends Resource
{
    protected static ?string $model = 'App\\Models\\VisiMisi';
     protected static string|UnitEnum|null $navigationGroup = 'PROFIL';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'visi misi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Visi Fakultas')
                    ->schema([
                        Forms\Components\Textarea::make('visi')
                            ->label('Teks Visi')
                            ->rows(3)
                            ->required()
                            ->placeholder('Contoh: Menjadi Fakultas Ilmu Kesehatan yang unggul...')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_aktif')
                            ->label('Tampilkan di Website')
                            ->default(true),
                    ]),

                Section::make('Daftar Misi')
                    ->schema([
                        Forms\Components\Repeater::make('misi')
                            ->label('Poin-poin Misi')
                            ->schema([
                                Forms\Components\Textarea::make('isi')
                                    ->label('Isi Misi')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->addActionLabel('Tambah Poin Misi')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Section::make('Daftar Tujuan')
                    ->schema([
                        Forms\Components\Repeater::make('tujuan')
                            ->label('Poin-poin Tujuan')
                            ->schema([
                                Forms\Components\Textarea::make('isi')
                                    ->label('Isi Tujuan')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->addActionLabel('Tambah Poin Tujuan')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Section::make('Daftar Sasaran')
                    ->schema([
                        Forms\Components\Repeater::make('sasaran')
                            ->label('Poin-poin Sasaran Strategis')
                            ->schema([
                                Forms\Components\TextInput::make('judul')
                                    ->label('Judul Sasaran')
                                    ->required()
                                    ->placeholder('Contoh: Keunggulan Mutu Lulusan'),
                                Forms\Components\Textarea::make('deskripsi')
                                    ->label('Deskripsi Sasaran')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->addActionLabel('Tambah Poin Sasaran')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

   public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(60)
                    ->searchable(),
                IconColumn::make('is_aktif')
                    ->label('Aktif')
                    ->boolean(),
                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y H:i'),
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
          'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
