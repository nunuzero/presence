<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Request;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Helper\ResourceTranslate;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\Group;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\RequestResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Group as InfolistGroup;
use Filament\Infolists\Components\Split as InfolistSplit;
use App\Filament\Resources\RequestResource\RelationManagers;
use Filament\Infolists\Components\Actions as InfolistActions;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\Actions\Action as InfolistAction;

class RequestResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = Request::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Request';

    protected static ?string $title = 'Request';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('subject')
                            ->label('Subject')
                            ->localizeLabel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('request_type')
                            ->label('Type')
                            ->localizeLabel()
                            ->required()
                            ->options([
                                'Izin' => 'Izin',
                                'Sakit' => 'Sakit',
                                'Cuti' => 'Cuti',
                            ])
                            ->native(false),
                        Forms\Components\Textarea::make('details')
                            ->label('Details')
                            ->localizeLabel()
                            ->required()
                            ->columnSpanFull()
                            ->rows(5),
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
                    ])->columns()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->label('Subject')
                    ->wrap()
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('request_type')
                    ->label('Type')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('From Date')
                    ->localizeLabel()
                    ->date(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('To')
                    ->localizeLabel()
                    ->date(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Staff Name')
                    ->localizeLabel()
                    ->searchable()
                    ->hidden(fn() => auth()->user()->hasRole('panel_user')),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->localizeLabel()
                    ->badge()
                    ->colors([
                        'warning' => static fn($state): bool => $state === 'Waiting',
                        'success' => static fn($state): bool => $state === 'Accepted',
                        'danger' => static fn($state): bool => $state === 'Rejected',
                    ])
                    ->icon(fn(string $state): string => match ($state) {
                        'Waiting' => 'heroicon-o-ellipsis-horizontal',
                        'Accepted' => 'heroicon-o-check-badge',
                        'Rejected' => 'heroicon-o-x-mark',
                    }),
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
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label(translate('Cancel'))
                    ->icon('heroicon-o-x-mark')
                    ->modalHeading(translate('Cancel Request'))
                    ->modalDescription(translate('Canceling will also delete the Request, Are you sure you want to do this?'))
                    ->modalIcon('heroicon-o-x-mark')
                    ->hidden(fn($record) => in_array($record->status, ['Accepted', 'Rejected'])),
            ])
            ->bulkActions([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make()
                    ->schema([
                        TextEntry::make('user.name')
                            ->label(translate('Staff Name')),
                        TextEntry::make('request_type')
                            ->label(translate('Type')),
                        InfolistGroup::make()
                            ->schema([
                                TextEntry::make('start_date')
                                    ->label(translate('From Date')),
                                TextEntry::make('end_date')
                                    ->label(translate('To')),
                            ])->columns()
                    ])->inlineLabel(),
                InfolistSplit::make([
                    InfolistSection::make()
                        ->schema([
                            TextEntry::make('subject')
                                ->label(translate('Subject')),
                            TextEntry::make('details')
                                ->label(translate('Details'))
                                ->prose()
                                ->alignJustify(),
                        ]),
                    InfolistGroup::make()
                        ->schema([
                            InfolistSection::make()
                                ->schema([
                                    TextEntry::make('status')
                                        ->label(translate('Status'))
                                        ->badge()
                                        ->colors([
                                            'warning' => static fn($state): bool => $state === 'Waiting',
                                            'success' => static fn($state): bool => $state === 'Accepted',
                                            'danger' => static fn($state): bool => $state === 'Rejected',
                                        ])
                                        ->icon(fn(string $state): string => match ($state) {
                                            'Waiting' => 'heroicon-o-ellipsis-horizontal',
                                            'Accepted' => 'heroicon-o-check-badge',
                                            'Rejected' => 'heroicon-o-x-mark',
                                        }),
                                    TextEntry::make('created_at')
                                        ->label(translate('Requested At'))
                                        ->dateTime(),
                                    TextEntry::make('updated_at')
                                        ->label(translate('Approval Response Given At'))
                                        ->dateTime()
                                        ->formatStateUsing(
                                            fn($record) =>
                                            $record->created_at->eq($record->updated_at) ? '-' : $record->updated_at->toFormattedDateString() . ' ' . $record->updated_at->format('H:i:s')
                                        ),
                                ]),
                            InfolistSection::make(translate('Approval'))
                                ->schema([
                                    InfolistActions::make([
                                        InfolistAction::make('Accept')
                                            ->label(translate('Accept'))
                                            ->color('success')
                                            ->icon('heroicon-o-check-badge')
                                            ->requiresConfirmation()
                                            ->action(function ($record) {
                                                $staff = \App\Models\Staff::where('user_id', $record->user_id)->first();

                                                if (!$staff) {
                                                    return;
                                                }

                                                if ($record->request_type === 'Cuti') {
                                                    $startDate = \Carbon\Carbon::parse($record->start_date);

                                                    $leave = \App\Models\Leave::where('staff_id', $staff->id)
                                                        ->where('year', $startDate->year)
                                                        ->where('month', $startDate->month)
                                                        ->first();

                                                    if (!$leave) {
                                                        return;
                                                    }

                                                    $daysRequested = $startDate->diffInDays(\Carbon\Carbon::parse($record->end_date)) + 1;

                                                    if ($leave->remaining_leave < $daysRequested) {
                                                        Notification::make()
                                                            ->title(translate('Not Enough Remaining Leave'))
                                                            ->body(translate('The requested days exceed the available remaining leave.'))
                                                            ->danger()
                                                            ->send();

                                                        return;
                                                    }

                                                    $newRemainingLeave = $leave->remaining_leave - $daysRequested;

                                                    $leave->update(['remaining_leave' => $newRemainingLeave]);
                                                }

                                                $presenceType = \App\Models\PresenceType::where('type', $record->request_type)->first();

                                                if (!$presenceType) {
                                                    return;
                                                }

                                                $startDate = \Carbon\Carbon::parse($record->start_date);
                                                $endDate = \Carbon\Carbon::parse($record->end_date);
                                                $userId = $record->user_id;

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

                                                $record->update(['status' => 'Accepted']);
                                            })
                                            ->modalHeading(translate('Accept Request'))
                                            ->modalDescription(translate('Accepting/Rejecting can only be done once and cannot be changed afterwards, are you sure you want to do this?'))
                                            ->modalIcon('heroicon-o-check-badge'),
                                        InfolistAction::make('Reject')
                                            ->label(translate('Reject'))
                                            ->color('danger')
                                            ->icon('heroicon-o-x-mark')
                                            ->requiresConfirmation()
                                            ->action(fn($record) => $record->update(['status' => 'Rejected']))
                                            ->modalHeading(translate('Reject Request'))
                                            ->modalDescription(translate('Accepting/Rejecting can only be done once and cannot be changed afterwards, are you sure you want to do this?'))
                                            ->modalIcon('heroicon-o-x-mark'),
                                    ]),
                                ])
                                ->hidden(fn($record) => in_array($record->status, ['Accepted', 'Rejected']) || auth()->user()->hasRole('panel_user')),
                        ])->grow(false),
                ]),
            ])
            ->columns(1);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        // Periksa apakah pengguna memiliki peran 'super_admin'
        if (!Auth::user() || !Auth::user()->hasRole('super_admin')) {
            return null; // Tidak tampilkan badge jika bukan super_admin
        }

        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::where('status', 'Waiting')->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequests::route('/'),
            'create' => Pages\CreateRequest::route('/create'),
            'view' => Pages\ViewRequest::route('/{record}'),
        ];
    }
}
