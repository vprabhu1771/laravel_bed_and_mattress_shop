<?php

namespace App\Filament\Resources\ThicknessResource\Pages;

use App\Filament\Resources\ThicknessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThickness extends EditRecord
{
    protected static string $resource = ThicknessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
