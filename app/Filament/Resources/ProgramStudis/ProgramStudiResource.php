<?php

namespace App\Filament\Resources\ProgramStudis;

use App\Filament\Resources\ProgramStudis\Pages\CreateProgramStudi;
use App\Filament\Resources\ProgramStudis\Pages\EditProgramStudi;
use App\Filament\Resources\ProgramStudis\Pages\ListProgramStudis;
use App\Filament\Resources\ProgramStudis\Schemas\ProgramStudiForm;
use App\Filament\Resources\ProgramStudis\Tables\ProgramStudisTable;
use App\Models\ProgramStudi;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProgramStudiResource extends Resource
{
    protected static ?string $model = ProgramStudi::class;
    protected static string|UnitEnum|null $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Program Studi';

    public static function form(Schema $form): Schema
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('nama_prodi')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\Select::make('jenjang')
                ->options([
                    'D3' => 'D3',
                    'S1' => 'S1',
                    'Profesi' => 'Profesi',
                    'S2' => 'S2',
                ])
                ->required(),
            Forms\Components\TextInput::make('akreditasi')
                ->placeholder('Contoh: Unggul / B / Baik Sekali'),
            Forms\Components\RichEditor::make('deskripsi')
                ->columnSpanFull(),
            Forms\Components\RichEditor::make('visi_misi')
                ->columnSpanFull(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_prodi')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('jenjang')->badge(),
            Tables\Columns\TextColumn::make('akreditasi')->default('-'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => ListProgramStudis::route('/'),
            'create' => CreateProgramStudi::route('/create'),
            'edit' => EditProgramStudi::route('/{record}/edit'),
        ];
    }
}
