<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Endpoint;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EndpointResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\EndpointResource\RelationManagers;
use App\Filament\Resources\EndpointResource\RelationManagers\MappingsRelationManager;

class EndpointResource extends Resource
{
    protected static ?string $model = Endpoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Endpoint::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('url')
                    ->searchable(),
                TextColumn::make('mappings.source')
                    ->label('Source Field')
                    ->searchable(),
                TextColumn::make('mappings.target')
                    ->label('Target Field')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->iconButton(),
                Tables\Actions\EditAction::make()
                    ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MappingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEndpoints::route('/'),
            'create' => Pages\CreateEndpoint::route('/create'),
            'view' => Pages\ViewEndpoint::route('/{record}'),
            'edit' => Pages\EditEndpoint::route('/{record}/edit'),
        ];
    }
}
