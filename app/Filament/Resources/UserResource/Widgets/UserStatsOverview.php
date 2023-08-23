<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use App\Models\Department;
use Filament\Tables\Actions\Position;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // $vt = Position::where('position_code', 'VT-005')->withCount('employees')->first();
        // $pb = User::where('name', 'ROCKY')->count();
        // $fl3 = Department::where('name', 'floor 3')->withCount('employees')->first();
        //dd($pb);
        
        return [
            //
            Card::make('All Employees', User::all()->count())
            ->Icon('heroicon-o-user-group'),
            Card::make('Today Attendence', User::where('status', '1')->count())
            ->Icon('heroicon-o-user'),
            // Card::make('Position code VT-005', $vt ? $vt ->employees_count:0)
            // ->Icon('heroicon-o-user'),

            
            // Card::make('Position code VT-005', $vt ? $vt ->employees_count:0)
            // ->Icon('heroicon-o-user'),
            // // Card::make("Number of people in floor 4", $pb ? $pb ->employees_count:0)
            // // ->Icon('heroicon-o-office-building'),
            // // Card::make("Number of people in floor 3", $fl3 ? $fl3 ->employees_count:0)
            // // ->Icon('heroicon-o-office-building'),
        ];
    }
}
