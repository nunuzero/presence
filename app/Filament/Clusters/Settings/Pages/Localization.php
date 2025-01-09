<?php

namespace App\Filament\Clusters\Settings\Pages;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Filament\Clusters\Settings;
use Filament\Forms\Components\Select;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Setting\Localization as LocalizationModel;

class Localization extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static string $view = 'filament.clusters.settings.pages.localization';

    protected static ?string $cluster = Settings::class;

    public function mount(): void
    {
        $localization = LocalizationModel::first();

        if ($localization) {
            $this->form->fill($localization->attributesToArray());
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getGeneralSection(),
            ])
            ->statePath('data');
    }

    protected function getGeneralSection(): Component
    {
        return Section::make('General')
            ->schema([
                Select::make('language')
                    // ->softRequired()
                    // ->localizeLabel()
                    // ->options(LocalizationModel::getAllLanguages())
                    ->options([
                        'en' => 'English',
                        'id' => 'Indonesian',
                    ])
                    ->searchable(),
                // Select::make('timezone')
                //     ->softRequired()
                //     ->localizeLabel()
                //     ->options(Timezone::getTimezoneOptions(CompanyProfileModel::first()->country))
                //     ->searchable(),
            ])->columns();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $localization = LocalizationModel::first();
            $localization->fill($data);
            $localization->save();
        } catch (Halt $exception) {
            return;
        }

        Notification::make() 
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send(); 
    }
}
