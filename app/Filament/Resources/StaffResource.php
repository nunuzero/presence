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
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_date')
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('education')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('note')
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->label('User')
                    ->options(User::all()->pluck('email', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('position_id')
                    ->required()
                    ->label('Position')
                    ->options(Position::all()->pluck('position', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.name')
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
            Fieldset::make()
                ->relationship('staff')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('start_date')
                        ->required()
                        ->native(false),
                    Forms\Components\TextInput::make('education')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('position_id')
                        ->required()
                        ->label('Position')
                        ->options(Position::all()->pluck('position', 'id'))
                        ->searchable(),
                    Forms\Components\Textarea::make('note')
                        ->columnSpanFull(),
                ])
        ];
    }

    public static function getUserForm(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->readOnly(),
            Forms\Components\TextInput::make('email')
                ->unique()
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->maxLength(255),
            Forms\Components\DateTimePicker::make('email_verified_at')
                ->native(false),
            Forms\Components\FileUpload::make('profile_image')
                ->image(),
        ];
    }
}
