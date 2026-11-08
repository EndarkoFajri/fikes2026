<?php

namespace App\Filament\Resources\Beritas;

use App\Filament\Resources\Beritas\Pages\CreateBerita;
use App\Filament\Resources\Beritas\Pages\EditBerita;
use App\Filament\Resources\Beritas\Pages\ListBeritas;
use App\Filament\Resources\Beritas\Schemas\BeritaForm;
use App\Filament\Resources\Beritas\Tables\BeritasTable;
use App\Models\Berita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static string|UnitEnum|null $navigationGroup = 'Informasi & Publikasi';
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Berita';

    
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
            \Filament\Forms\Components\TextInput::make('judul')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
            \Filament\Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),
            \Filament\Forms\Components\Select::make('kategori')
                ->options([
                    'Berita' => 'Berita',
                    'Pengumuman' => 'Pengumuman',
                    'Agenda' => 'Agenda Kegiatan',
                ])
                ->default('Berita')
                ->required(),
            \Filament\Forms\Components\Hidden::make('user_id')
                ->default(fn () => Auth::id()),
            \Filament\Forms\Components\FileUpload::make('gambar')
             ->image()
            ->disk('public')          
            ->directory('berita')    
            ->visibility('public')
            ->columnSpanFull(),
            \Filament\Forms\Components\RichEditor::make('konten')
                ->required()
                ->columnSpanFull(),
            ]);
    }


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('gambar')
                ->label('Thumbnail'),
            TextColumn::make('judul')
                ->label('Judul Berita')
                ->searchable()
                ->wrap()
                ->limit(50),
            TextColumn::make('kategori')
                ->badge()
                ->colors([
                    'success' => 'Berita',
                    'warning' => 'Pengumuman',
                    'info' => 'Agenda',
                ]),
            TextColumn::make('created_at')
                ->label('Diterbitkan')
                ->dateTime('d M Y H:i')
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            \Filament\Actions\EditAction::make(),
            \Filament\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            \Filament\Actions\BulkActionGroup::make([
                \Filament\Actions\DeleteBulkAction::make(),
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
            'index' => ListBeritas::route('/'),
            'create' => CreateBerita::route('/create'),
            'edit' => EditBerita::route('/{record}/edit'),
        ];
    }
}
