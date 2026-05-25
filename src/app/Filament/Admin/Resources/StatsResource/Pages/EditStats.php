<?php

namespace App\Filament\Admin\Resources\StatsResource\Pages;

use App\Filament\Admin\Resources\StatsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStats extends EditRecord
{
    protected static string $resource = StatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
