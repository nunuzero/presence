<?php

namespace App\Filament\Clusters\Settings\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Setting\WorkTime;
use Filament\Resources\Resource;
use App\Filament\Clusters\Settings;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Clusters\Settings\Resources\WorkTimeResource\Pages;
use App\Filament\Clusters\Settings\Resources\WorkTimeResource\RelationManagers;
use App\Helper\ClusterResourceTranslate;

class WorkTimeResource extends Resource
{
    use ClusterResourceTranslate;

    protected static ?string $model = WorkTime::class;

    protected static ?string $cluster = Settings::class;

    protected static ?string $title = 'Work Time';

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->localizeLabel()
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->localizeLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->localizeLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Work Time')
                    ->modalWidth('lg')
                    ->form([
                        Forms\Components\TextInput::make('day')
                            ->label('Day')
                            ->localizeLabel()
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255),
                        Forms\Components\Radio::make('is_workday')
                            ->label('Is Workday')
                            ->localizeLabel()
                            ->required()
                            ->boolean()
                            ->inline()
                            ->reactive()
                            ->afterStateUpdated(function (Set $set, $state) {
                                if (!$state) {
                                    $set('time_limit', null);
                                    $set('start_time', null);
                                    $set('end_time', null);
                                }
                            }),
                        Forms\Components\Section::make()
                            ->description(translate('petunjuk: anda dapat mengosongkan nya jika tidak ada batasan'))
                            ->schema([
                                Forms\Components\Select::make('time_limit')
                                    ->label('Time Limit')
                                    ->localizeLabel()
                                    ->options([
                                        '5' => '5 Minutes',
                                        '10' => '10 Minutes',
                                        '15' => '15 Minutes',
                                        '30' => '30 Minutes',
                                        '45' => '45 Minutes',
                                        '60' => '60 Minutes',
                                    ])
                                    ->disabled(fn($get) => !$get('is_workday'))
                                    ->dehydrated()
                                    ->native(false),
                            ]),
                        Forms\Components\Section::make()
                            ->description(translate('hint: start time cannot be earlier or equal to end time'))
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TimePicker::make('start_time')
                                            ->label('Start Time')
                                            ->localizeLabel()
                                            ->native(false)
                                            ->seconds(false)
                                            ->disabled(fn($get) => !$get('is_workday'))
                                            ->required(fn($get) => $get('is_workday'))
                                            ->dehydrated()
                                            ->afterStateUpdated(function (Set $set, $state) {
                                                if (!$state) {
                                                    $set('start_time', null);
                                                }
                                            }),

                                        Forms\Components\TimePicker::make('end_time')
                                            ->label('End Time')
                                            ->localizeLabel()
                                            ->native(false)
                                            ->seconds(false)
                                            ->disabled(fn($get) => !$get('is_workday'))
                                            ->required(fn($get) => $get('is_workday'))
                                            ->dehydrated()
                                            ->afterStateUpdated(function (Set $set, $state, $get) {
                                                $start_time = $get('start_time');

                                                if ($state <= $start_time) {
                                                    $set('end_time', null);
                                                }
                                            }),
                                    ])

                            ])

                    ]),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkTimes::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
