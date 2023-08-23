<?php

namespace App\Filament\Resources\SalaryResource\Pages;

use App\Filament\Resources\SalaryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSalary extends CreateRecord
{
    protected static string $resource = SalaryResource::class;
}




// <?php ở đây là Salary Resource 
// namespace App\Filament\Resources;

// use Filament\Forms;
// use Filament\Tables;
// use App\Models\Salary;
// use Filament\Resources\Form;
// use Filament\Resources\Table;
// use Filament\Resources\Resource;
// use Filament\Forms\Components\Card;
// use Filament\Tables\Columns\TextColumn;
// use Filament\Forms\Components\TextInput;
// use Illuminate\Database\Eloquent\Builder;
// use App\Filament\Resources\SalaryResource\Pages;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
// use App\Filament\Resources\SalaryResource\RelationManagers;

// class SalaryResource extends Resource
// {
    // protected static ?string $model = Salary::class;

    // protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    // protected static ?string $navigationGroup = 'System Management';

    // protected static ?int $navigationSort = 3;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 //
//                 Card::make()
//                 ->schema([
//                     // ...
//                     TextInput::make('name'),
//                     TextInput::make('subsidy'),
//                 ])
//             ]);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 //
//                 TextColumn::make('name')->sortable()->searchable(),
//                 TextColumn::make('subsidy')->sortable()->searchable(),
//                 TextColumn::make('created_at')->dateTime()
//             ])
//             ->filters([
//                 //
//             ])
//             ->actions([
//                 Tables\Actions\EditAction::make(),
//             ])
//             ->bulkActions([
//                 Tables\Actions\DeleteBulkAction::make(),
//             ]);
//     }
    
//     public static function getRelations(): array
//     {
//         return [
//             //
//         ];
//     }
    
//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ListSalaries::route('/'),
//             'create' => Pages\CreateSalary::route('/create'),
//             'edit' => Pages\EditSalary::route('/{record}/edit'),
//         ];
//     }    
// }
