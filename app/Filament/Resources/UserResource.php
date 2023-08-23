<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Widgets\UserStatsOverview;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Employees Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        // ...
                        TextInput::make('name')->required()->maxLength(255),

                        TextInput::make('email')->label('Email Address')->required()->maxLength(255),

                        TextInput::make('password')
                        ->password()
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->minLength(8)
                        ->same('passwordConfirmation')
                        ->dehydrated(fn ($state) => filled($state))
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state)),

                        TextInput::make('passwordConfirmation')
                        ->password()
                        ->label('Password Confirmation')
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->minLength(8)
                        ->dehydrated(false),


                        Select::make('position_id')
                        ->relationship('position', 'name')->required(),
                        Select::make('department_id')
                        ->relationship('department', 'name')->required(),
                        // Select::make('salary_id')
                        // ->relationship('salary', 'name')->required(),


                        Select::make('gender')
                        ->options([
                            'Khác' => 'Khác',
                            'Nam' => 'Nam',
                            'Nữ' => 'Nữ'
                        ])->required(),
                        
                        TextInput::make('phone_number')->required(),
                        TextInput::make('address')->required()->maxLength(255),
                        TextInput::make('attendence_record')->required()->maxLength(255),
                        
                        Select::make('status')
                        ->options([
                            '1' => 'Có mặt',
                            '0' => 'Vắng mặt',
                            
                        ])->required(),

                        DatePicker::make('birth_date')->required(),
                        DatePicker::make('date_hired')->required(),
                        TextInput::make('basic_salary')->required()->maxLength(255),
                        TextInput::make('subsidy')->required()->maxLength(255),
                        TextInput::make('salary_last_month')
                        

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                // TextColumn::make('created_at')->dateTime(now('Asia/Ho_Chi_Minh'))->sortable(),
                
                TextColumn::make('attendence_record'),

                TextColumn::make('attendence_time'),
                TextColumn::make('attendence_time_out'),

                TextColumn::make('salary')->sortable(),
                TextColumn::make('salary_last_month')->sortable(),
                TextColumn::make('status')->sortable()->enum([
                    '0' => 'Vắng mặt',
                    '1' => 'Có mặt',
                ]),
                
                
                
                
            ])
            ->filters([
                //
                SelectFilter::make('department')->relationship('department','name'),
                SelectFilter::make('position')->relationship('position','name')
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    // Tables\Actions\Attendence::make(),
                ]),

                
            ])
            ->bulkActions([
                Tables\Actions\StatusBulkAction::make(),

                Tables\Actions\AttendenceSuccessBulkAction::make(),

                Tables\Actions\AttendenceBulkAction::make(),

                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            UserStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
