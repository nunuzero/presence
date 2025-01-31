<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Position;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StaffResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Helper\ResourceTranslate;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;

class StaffResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $title = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->localizeLabel()
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Group::make()
                                    ->relationship('staff')
                                    ->schema([
                                        Forms\Components\DatePicker::make('start_date')
                                            ->label('Start Date')
                                            ->localizeLabel()
                                            ->required()
                                            ->native(false),
                                        Forms\Components\TextInput::make('education')
                                            ->label('Education')
                                            ->localizeLabel()
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Select::make('position_id')
                                            ->label('Position')
                                            ->localizeLabel()
                                            ->required()
                                            ->options(Position::all()->pluck('position', 'id'))
                                            ->searchable(),
                                        Forms\Components\Textarea::make('note')
                                            ->label('Note')
                                            ->localizeLabel()
                                            ->columnSpanFull(),
                                    ])
                            ])->columnSpan(['lg' => 2]),
                        Group::make()
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Placeholder::make('email')
                                            ->content(fn($record): string => $record->email),
                                    ]),
                                Section::make()
                                    ->schema([
                                        Forms\Components\Select::make('roles')
                                            ->relationship('roles', 'name')
                                            ->preload()
                                            ->searchable(),
                                    ]),
                            ])->columnSpan(['lg' => 1]),
                    ])->columns(3)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::where('name', '!=', 'Admin'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('staff.start_date')
                    ->label('Start Date')
                    ->localizeLabel()
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('staff.education')
                    ->label('Education')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('staff.position.position')
                    ->label('Position')
                    ->localizeLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('staff.created_at')
                    ->label('Created At')
                    ->localizeLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('staff.updated_at')
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }

    public static function getStaffForm(): array
    {
        return [
            Group::make()
                ->relationship('staff')
                ->schema([
                    Forms\Components\DatePicker::make('start_date')
                        ->label('Start Date')
                        ->localizeLabel()
                        ->required()
                        ->native(false),
                    Forms\Components\TextInput::make('education')
                        ->label('Education')
                        ->localizeLabel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('position_id')
                        ->label('Position')
                        ->localizeLabel()
                        ->required()
                        ->options(Position::all()->pluck('position', 'id'))
                        ->searchable(),
                    Forms\Components\Textarea::make('note')
                        ->label('Note')
                        ->localizeLabel()
                        ->columnSpanFull(),
                ])->columns()
        ];
    }

    public static function getUserForm(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->localizeLabel()
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('roles')
                ->relationship('roles', 'name')
                ->preload()
                ->searchable()
                ->default('2'),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->localizeLabel()
                ->unique()
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->localizeLabel()
                ->password()
                ->required()
                ->revealable()
                ->maxLength(255),
        ];
    }
}
