<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Filament\Resources\InventoryResource\RelationManagers;
use App\Models\Inventory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\Widgets\InventoryChart;


class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Inventar';

    protected static ?string $recordTitleAttribute = 'Inventar IT';
    protected static ?string $modelLabel = 'Inventar IT';
    protected static ?string $pluralModelLabel = 'Inventar IT';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('product_name')
                    ->label('Denumire echipament')
                    ->required(),
                TextInput::make('product_vendor')
                    ->label('Producator')
                    ->required(),
                TextInput::make('product_model')
                    ->label('Model')
                    ->required(),
                TextInput::make('product_number')
                    ->label('Serial Number')
                    ->required(),
                TextInput::make('product_type')
                    ->label('Tipul Echipamentului')
                    ->required(),
                Select::make('product_location')
                    ->options ([
                        'alexandriei_140' => 'Alexandriei 140',
                        'alexandriei_144' => 'Alexandriei 144',
                        'alexandriei_150' => 'Alexandriei 150',
                        'rahova' => 'Rahova',
                        'crangasi' => 'Crangasi',
                        'bragadiru' => 'Bragadiru',
                        ])
                    ->label('Locatie')
                    ->required(),
                Select::make('product_floor')
                    ->options ([
                        'parter' => 'Parter',
                        'etaj_1' => 'Etaj 1', 
                        'etaj_2' => 'Etaj 2', 
                        'etaj_3' => 'Etaj 3',
                        'etaj_4' => 'Etaj 4',
                        ])
                    ->label('Etajul')
                    ->required(),
                TextInput::make('product_office')
                    ->label('Cabinetul')
                    ->required(),
                DatePicker::make('product_purchase_date')
                    ->maxDate(now())
                    ->label('Data achizitiei')
                    ->required(),
                TextInput::make('ip_address')
                    ->label('Adresa IP'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_name')
                ->label('Denumire')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('product_vendor')
                ->label('Producator')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('product_model')
                ->label('Model')
                ->sortable()
                ->searchable(),
                // Tables\Columns\TextColumn::make('product_number')
                // ->label('Serial Number')
                // ->sortable()
                // ->searchable(),
                Tables\Columns\TextColumn::make('product_type')
                ->label('Tipul')
                ->sortable()
                ->searchable()
                ->limit("10"),
                Tables\Columns\TextColumn::make('product_office')
                ->label('Cabinetul')
                ->sortable()
                ->searchable()
                ->limit("10"),
                Tables\Columns\TextColumn::make('product_location')
                ->label('Locatia')
                ->sortable()
                ->searchable()
                ->enum([
                    'alexandriei_140' => 'Alx 140',
                    'alexandriei_144' => 'Alx 144',
                    'alexandriei_150' => 'Alx 150',
                    'rahova' => 'Rahova',
                    'crangasi' => 'Crangasi',
                    'bragadiru' => 'Bragadiru',
                ]),
                Tables\Columns\TextColumn::make('product_purchase_date')
                ->label('Data achizitiei')
                ->sortable(),
                Tables\Columns\TextColumn::make('ip_address')
                ->label('Adresa IP')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                // Tables\Actions\EditAction::make(),
                ]),
            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }  
    

    protected function getHeaderWidgets(): array
{
    return [
        InventoryOverview::class
    ];
}

    public static function getWidgets(): array
    {
    return [
        InventoryResource\Widgets\InventoryOverview::class,
    ];
    }  
}
