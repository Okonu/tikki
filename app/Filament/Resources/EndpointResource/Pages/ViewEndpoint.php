<?php

namespace App\Filament\Resources\EndpointResource\Pages;

use App\Filament\Resources\EndpointResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEndpoint extends ViewRecord
{
    protected static string $resource = EndpointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
