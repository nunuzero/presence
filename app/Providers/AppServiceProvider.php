<?php

namespace App\Providers;

use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\App;
use App\Models\Setting\Localization;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentColor;
use Filament\Notifications\Livewire\Notifications;
use Illuminate\Support\Facades\URL;

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
        if (request()->header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
            config(['filesystems.disks.public.url' => secure_url('storage')]);
        }

        $language = Localization::first()?->language ?? 'en';
        App::setLocale($language);

        $timezone = Localization::first()?->timezone ?? 'UTC';
        Config::set('app.timezone', $timezone);
        date_default_timezone_set($timezone);

        Notifications::alignment(Alignment::Center);

        FilamentAsset::register([
            Js::make('TopNavigation', __DIR__ . '/../../resources/js/TopNavigation.js'),
        ]);

        FilamentColor::register([
            'sky' => Color::Sky,
            'violet' => Color::Violet,
            'slate' => Color::Slate,
        ]);
    }
}
