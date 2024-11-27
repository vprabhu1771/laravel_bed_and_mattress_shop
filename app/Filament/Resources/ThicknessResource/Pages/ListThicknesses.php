<?php

namespace App\Filament\Resources\ThicknessResource\Pages;

use App\Filament\Resources\ThicknessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThicknesses extends ListRecords
{
    protected static string $resource = ThicknessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
