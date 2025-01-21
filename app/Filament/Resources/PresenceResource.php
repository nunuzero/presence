<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresenceResource\Pages;
use App\Filament\Resources\PresenceResource\RelationManagers;
use App\Helper\ResourceTranslate;
use App\Models\Presence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresenceResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = Presence::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Presence';

    protected static ?string $title = 'Presence';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('presence_type_id')
                    ->relationship('presenceType', 'id')
                    ->required(),
                Forms\Components\DateTimePicker::make('time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                        'success' => static fn ($state): bool => $state === 'WFO' || $state === 'WFH',
                        'sky' => static fn ($state): bool => $state === 'Izin',
                        'danger' => static fn ($state): bool => $state === 'Sakit',
                        'violet' => static fn ($state): bool => $state === 'Cuti',
                    ]),
                Tables\Columns\TextColumn::make('time')
                    ->label('Time')
                    ->localizeLabel()
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
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
