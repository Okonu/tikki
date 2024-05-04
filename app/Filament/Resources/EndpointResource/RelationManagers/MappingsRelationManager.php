<?php

namespace App\Filament\Resources\EndpointResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextInputColumn;

class MappingsRelationManager extends RelationManager
{
    protected static string $relationship = 'mappings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('source')
                    ->required()
                    ->maxLength(255),
                Select::make('target')
                    ->required()
                    ->options([
                        'owner_name' => 'Certifcate Owner Name',
                        'certificate_number' => 'Certificate Number',
                        'issuing_institution' => 'Issuing Institution',
                        'issuing_date' => 'Issuing Date',
                        'expiration_date' => 'Expiration Date',
                    ]),
    
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('source')
            ->columns([
                TextColumn::make('source'),
                TextColumn::make('target')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->slideOver(),
            ])
            ->actions([
                // Tables\Actions\CreateAction::make()
                //     ->slideOver(),
                Tables\Actions\EditAction::make()
                    ->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
