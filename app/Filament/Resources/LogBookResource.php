<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\LogBook;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Helper\ResourceTranslate;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Split;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\LogBookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LogBookResource\RelationManagers;

class LogBookResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = LogBook::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Presence';

    protected static ?string $title = 'Logbook';

    public static function table(Table $table): Table
    {
        return $table
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
                    ->label('Staff Name')
                    ->localizeLabel(),
                Tables\Columns\TextColumn::make('work')
                    ->label('Work')
                    ->localizeLabel()
                    ->searchable()
                    ->wrap()
                    ->formatStateUsing(fn($state) => nl2br(e($state))) // Mengubah newline menjadi <br>
                    ->html(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->localizeLabel()
                    ->date()
                    ->searchable(),
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
            ->defaultSort('date', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Split::make([
                    Group::make([
                        Section::make([
                            TextEntry::make('user.name')
                                ->label(translate('Staff Name')),
                            TextEntry::make('date')
                                ->label(translate('Date'))
                                ->date(),
                            TextEntry::make('created_at')
                                ->label(translate('Created At'))
                                ->formatStateUsing(fn($state) => Carbon::parse($state)->format('H:i:s'))
                        ])->inlineLabel(),
                    ]),

                    Section::make([
                        TextEntry::make('work')
                            ->label(translate('Work'))
                            ->formatStateUsing(fn($state) => nl2br(e($state)))
                            ->html(),
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLogBooks::route('/'),
        ];
    }
}
