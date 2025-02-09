<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Setting\WorkTime;
use Filament\Widgets\TableWidget as BaseWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class WorkTimeTableWidget extends BaseWidget
{
    use HasWidgetShield;

    public static function canView(): bool
    {
        return auth()->user()->can('widget_WorkTimeTableWidget');
    }   

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Jadwal Kerja';
    
    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(WorkTime::query())
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->localizeLabel()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return translate($state);
                    }),
                Tables\Columns\IconColumn::make('is_workday')
                    ->label('Is Workday')
                    ->localizeLabel()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->boolean(),
                Tables\Columns\TextColumn::make('time_limit')
                    ->label('Time Limit')
                    ->localizeLabel()
                    ->suffix(function ($record) {
                        return $record->time_limit > 1 ? ' Minutes' : ' Minute';
                    }),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Start Time')
                    ->localizeLabel()
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('End Time')
                    ->localizeLabel()
                    ->time('H:i'),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                // Tambahkan actions jika diperlukan
            ])
            ->bulkActions([
                // Tambahkan bulk actions jika diperlukan
            ]);
    }
}
