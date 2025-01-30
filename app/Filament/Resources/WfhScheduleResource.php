<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\WfhSchedule;
use Filament\Resources\Resource;
use App\Helper\ResourceTranslate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WfhScheduleResource\Pages;
use App\Filament\Resources\WfhScheduleResource\RelationManagers;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;

class WfhScheduleResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = WfhSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $title = 'Staff WFH Schedule';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Staff Name')
                            ->localizeLabel()
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable(),
                    ])->columns(),
                Section::make()
                    ->schema([
                        Forms\Components\Toggle::make('monday')
                            ->required()
                            ->label('Monday')
                            ->localizeLabel(),
                        Forms\Components\Toggle::make('tuesday')
                            ->required()
                            ->label('Tuesday')
                            ->localizeLabel(),
                        Forms\Components\Toggle::make('wednesday')
                            ->required()
                            ->label('Wednesday')
                            ->localizeLabel(),
                        Forms\Components\Toggle::make('thursday')
                            ->required()
                            ->label('Thursday')
                            ->localizeLabel(),
                        Forms\Components\Toggle::make('friday')
                            ->required()
                            ->label('Friday')
                            ->localizeLabel(),
                        Forms\Components\Toggle::make('saturday')
                            ->required()
                            ->label('Saturday')
                            ->localizeLabel(),
                        Forms\Components\Toggle::make('sunday')
                            ->required()
                            ->label('Sunday')
                            ->localizeLabel(),
                    ])->columns(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Staff Name')
                    ->localizeLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('monday')
                    ->boolean()
                    ->label('Monday')
                    ->localizeLabel(),
                Tables\Columns\IconColumn::make('tuesday')
                    ->boolean()
                    ->label('Tuesday')
                    ->localizeLabel(),
                Tables\Columns\IconColumn::make('wednesday')
                    ->boolean()
                    ->label('Wednesday')
                    ->localizeLabel(),
                Tables\Columns\IconColumn::make('thursday')
                    ->boolean()
                    ->label('Thursday')
                    ->localizeLabel(),
                Tables\Columns\IconColumn::make('friday')
                    ->boolean()
                    ->label('Friday')
                    ->localizeLabel(),
                Tables\Columns\IconColumn::make('saturday')
                    ->boolean()
                    ->label('Saturday')
                    ->localizeLabel(),
                Tables\Columns\IconColumn::make('sunday')
                    ->boolean()
                    ->label('Sunday')
                    ->localizeLabel(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListWfhSchedules::route('/'),
            'create' => Pages\CreateWfhSchedule::route('/create'),
            'edit' => Pages\EditWfhSchedule::route('/{record}/edit'),
        ];
    }
}
