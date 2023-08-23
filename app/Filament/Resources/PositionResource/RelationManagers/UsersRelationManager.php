<?php

namespace App\Filament\Resources\PositionResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),

                TextInput::make('email')->label('Email Address')->required()->maxLength(255),


                Select::make('position_id')
                ->relationship('position', 'name')->required(),
                Select::make('department_id')
                ->relationship('department', 'name')->required(),
                Select::make('salary_id')
                ->relationship('salary', 'name')->required(),


                Select::make('gender')
                ->options([
                    'Khác' => 'Khác',
                    'Nam' => 'Nam',
                    'Nữ' => 'Nữ'
                ])->required(),
                
                TextInput::make('phone_number')->required(),
                TextInput::make('address')->required()->maxLength(255),
                TextInput::make('attendence')->required()->maxLength(255),
                TextInput::make('status')->required()->maxLength(255),
                DatePicker::make('birth_date')->required(),
                DatePicker::make('date_hired')->required(),
                TextInput::make('money')->required()->maxLength(255),
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime(now('Asia/Ho_Chi_Minh'))->sortable(),
                
                TextColumn::make('attendence'),
                TextColumn::make('attendence_time'),
                TextColumn::make('status')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
