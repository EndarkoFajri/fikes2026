<?php

namespace App\Filament\Resources\Galeris;

use App\Filament\Resources\Galeris\Pages\CreateGaleri;
use App\Filament\Resources\Galeris\Pages\EditGaleri;
use App\Filament\Resources\Galeris\Pages\ListGaleris;
use App\Filament\Resources\Galeris\Schemas\GaleriForm;
use App\Filament\Resources\Galeris\Tables\GalerisTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GaleriResource extends Resource
{
    protected static ?string $model = 'App\\Models\\Galeri';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'galeri';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
            \Filament\Forms\Components\TextInput::make('judul')
                ->required()
                ->maxLength(255)
                ->placeholder('Contoh: Praktik Simulasi Klinis'),
            \Filament\Forms\Components\FileUpload::make('foto')
                ->image()
                ->directory('galeri')
                ->disk('public')
                ->required(),
            \Filament\Forms\Components\TextInput::make('urutan')
                ->numeric()
                ->default(1)
                ->helperText('Urutan 1 sampai 6 pada tata letak beranda'),
            \Filament\Forms\Components\Toggle::make('is_aktif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('foto')->disk('public'),
            TextColumn::make('judul')->searchable(),
            TextColumn::make('urutan')->sortable(),
            IconColumn::make('is_aktif')->boolean(),
        ])
        ->defaultSort('urutan', 'asc');
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
            'index' => ListGaleris::route('/'),
            'create' => CreateGaleri::route('/create'),
            'edit' => EditGaleri::route('/{record}/edit'),
        ];
    }
}
