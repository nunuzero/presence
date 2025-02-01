<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Presence;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Helper\ResourceTranslate;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PresenceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PresenceResource\RelationManagers;

class PresenceResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = Presence::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Presence';

    protected static ?string $title = 'Presence';

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Action::make('create_sick_presence')
                    ->label(translate('Create Sick Presence'))
                    ->icon('heroicon-o-clipboard-document-list')
                    ->modalSubmitActionLabel(translate('Create'))
                    ->modalHeading(translate('Create Sick Presence'))
                    ->form([
                        Select::make('user_id')
                            ->label('Staff Name')
                            ->localizeLabel()
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable(),
                        Section::make()
                            ->description(translate('hint: To cannot be earlier than From Date'))
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('From Date')
                                    ->localizeLabel()
                                    ->native(false)
                                    ->required(),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('To')
                                    ->localizeLabel()
                                    ->native(false)
                                    ->required()
                                    ->afterOrEqual('start_date'),
                            ])->columns(),
                    ])
                    ->action(function (array $data) {
                        $presenceType = \App\Models\PresenceType::where('type', 'Sakit')->first();
                
                        if (!$presenceType) {
                            return;
                        }
                
                        $startDate = \Carbon\Carbon::parse($data['start_date']);
                        $endDate = \Carbon\Carbon::parse($data['end_date']);
                        $userId = $data['user_id'];
                
                        $currentDate = $startDate;
                
                        while ($currentDate <= $endDate) {
                            \App\Models\Presence::create([
                                'user_id' => $userId,
                                'presence_type_id' => $presenceType->id,
                                'date' => $currentDate->format('Y-m-d'),
                                'time_arrived' => null,
                                'return_time' => null,
                            ]);
                            $currentDate->addDay();
                        }
                    }),
            ])
            ->groups([
                Tables\Grouping\Group::make('date')
                    ->label(translate('Day'))
                    ->date('d ' . translate('F') . ' t')
                    ->collapsible()
                    ->orderQueryUsing(fn(Builder $query) => $query->orderBy('date', 'desc')),
            ])
            ->groupingDirectionSettingHidden()
            ->defaultGroup('date')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('presenceType.type')
                    ->label('Presence Type')
                    ->localizeLabel()
                    ->badge()
                    ->colors([
                        'success' => static fn($state): bool => $state === 'WFO' || $state === 'WFH',
                        'sky' => static fn($state): bool => $state === 'Izin',
                        'violet' => static fn($state): bool => $state === 'Sakit',
                        'slate' => static fn($state): bool => $state === 'Cuti',
                        'danger' => static fn($state): bool => $state === 'Tidak Masuk',
                    ])
                    ->icon(fn(string $state): string => match ($state) {
                        'WFO' => 'heroicon-o-building-office',
                        'WFH' => 'heroicon-o-home',
                        default => '',
                    }),
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->localizeLabel()
                    ->date()
                    ->sortable()
                    ->hidden(),
                Tables\Columns\TextColumn::make('time_arrived')
                    ->label('Time Arrived')
                    ->localizeLabel()
                    ->time(),
                Tables\Columns\TextColumn::make('return_time')
                    ->label('Return Time')
                    ->localizeLabel()
                    ->time(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('date', 'desc')
            ->actions([])
            ->bulkActions([]);
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
            'index' => Pages\ListPresences::route('/'),
        ];
    }
}
