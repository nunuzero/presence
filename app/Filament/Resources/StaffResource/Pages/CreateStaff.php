<?php

namespace App\Filament\Resources\StaffResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use App\Helper\RedirectToListPage;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use App\Filament\Resources\StaffResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateStaff extends CreateRecord
{
    use RedirectToListPage, HasWizard;

    protected static string $resource = StaffResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)
            ->schema([
                Wizard::make($this->getSteps())
                    ->submitAction($this->getSubmitFormAction()),
            ])
            ->columns(null);
    }

    protected function getSteps(): array
    {
        return [
            Step::make('staff_user')
                ->label('User for staff')
                ->schema(StaffResource::getUserForm())
                ->columns(),
            Step::make('staff_information')
                ->label('Staff information')
                ->schema(StaffResource::getStaffForm()),
        ];
    }
}
