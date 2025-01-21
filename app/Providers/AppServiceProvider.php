<?php

namespace App\Providers;

use Filament\Support\Assets\Js;
use Illuminate\Support\Facades\App;
use App\Models\Setting\Localization;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Filament\Notifications\Livewire\Notifications;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $language = Localization::first()?->language ?? 'en';
        App::setLocale($language);

        Notifications::alignment(Alignment::Center);

        FilamentAsset::register([
            Js::make('TopNavigation', __DIR__ . '/../../resources/js/TopNavigation.js'),
        ]);

        FilamentColor::register([
            'sky' => Color::Sky,
            'violet' => Color::Violet,
        ]);
    }
}
