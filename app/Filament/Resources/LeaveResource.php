<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Leave;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Helper\ResourceTranslate;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LeaveResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LeaveResource\RelationManagers;

class LeaveResource extends Resource
{
    use ResourceTranslate;

    protected static ?string $model = Leave::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Presence';

    protected static ?string $title = 'Leave';

    public static function table(Table $table): Table
    {
        return $table
            ->query(Leave::query()->orderByDesc('year')->orderByDesc('month'))
            ->columns([
                Tables\Columns\TextColumn::make('staff.user.name')
                    ->label('Staff Name')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Year')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('month')
                    ->label('Month')
                    ->localizeLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('leave_allocation')
                    ->label('Leave Allocation')
                    ->localizeLabel(),
                Tables\Columns\TextColumn::make('remaining_leave')
                    ->label('Remaining Leave')
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
                // Tambahkan filter jika diperlukan
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
            'index' => Pages\ListLeaves::route('/'),
        ];
    }
}
