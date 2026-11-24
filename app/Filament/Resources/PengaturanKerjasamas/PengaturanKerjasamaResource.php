<?php

namespace App\Filament\Resources\PengaturanKerjasamas;

use App\Filament\Resources\PengaturanKerjasamas\Pages\CreatePengaturanKerjasama;
use App\Filament\Resources\PengaturanKerjasamas\Pages\EditPengaturanKerjasama;
use App\Filament\Resources\PengaturanKerjasamas\Pages\ListPengaturanKerjasamas;
use App\Filament\Resources\PengaturanKerjasamas\Schemas\PengaturanKerjasamaForm;
use App\Filament\Resources\PengaturanKerjasamas\Tables\PengaturanKerjasamasTable;
use App\Models\PengaturanKerjasama;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class PengaturanKerjasamaResource extends Resource
{
    protected static ?string $model = PengaturanKerjasama::class;
    protected static string|UnitEnum|null $navigationGroup = 'PROFIL';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'kerjasama';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Pedoman Kerja Sama (PDF)')
                    ->schema([
                        TextInput::make('judul_pedoman')
                            ->label('Judul Pedoman')
                            ->default('Pedoman Kerja Sama FIKES UDS')
                            ->required(),
                        FileUpload::make('file_pedoman_pdf')
                            ->label('Upload File Pedoman (PDF)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->disk('public')
                            ->directory('pedoman-kerjasama')
                            ->visibility('public')
                            ->maxSize(20480),
                    ]),

                Section::make('Form Upload IA (Embed)')
                    ->schema([
                        TextInput::make('judul_form_ia')
                            ->label('Judul Halaman Upload IA')
                            ->default('Formulir Upload Implementation Arrangement (IA)')
                            ->required(),
                        Textarea::make('link_embed_ia')
                            ->label('URL Embed Google Form')
                            ->rows(2)
                            ->placeholder('https://docs.google.com/forms/d/e/xxxxx/viewform?embedded=true')
                            ->helperText('Ambil link dari Google Form > Kirim > Ikon Embed (< >) lalu salin isi atribut src="..." saja.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_pedoman')->label('Pedoman'),
                TextColumn::make('link_embed_ia')->label('Link Form IA')->limit(40),
                TextColumn::make('updated_at')->label('Diperbarui')->dateTime('d M Y'),
            ])
            ->actions([
                EditAction::make(),
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
            'index' => ListPengaturanKerjasamas::route('/'),
            'create' => CreatePengaturanKerjasama::route('/create'),
            'edit' => EditPengaturanKerjasama::route('/{record}/edit'),
        ];
    }
}
