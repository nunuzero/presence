<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Position;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Helper\ResourceTranslate;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PositionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PositionResource\RelationManagers;

class PositionResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = Position::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $title = 'Position';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('position')
                            ->label('Position')
                            ->localizeLabel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('leave_allocation')
                            ->label('Leave Allocation')
                            ->localizeLabel()
                            ->required()
                            ->numeric(),
                        Select::make('category')
                            ->label('Category')
                            ->localizeLabel()
                            ->required()
                            ->options([
                                'Project Manager' => 'Project Manager',
                                'Programmer' => 'Programmer',
                                'UI/UX' => 'UI/UX',
                                'Support & Marketing' => 'Support & Marketing',
                                'Intern' => 'Intern',
                            ])
                            ->native(false),
                    ])->columns()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('position')
                    ->label('Position')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('leave_allocation')
                    ->label('Leave Allocation')
                    ->localizeLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->localizeLabel()
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
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
        ];
    }
}
