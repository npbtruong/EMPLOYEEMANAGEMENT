<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //
    public function index() {
        $users = DB::table("users")->get();
        $announcements = DB::table("announcements")->get();
       
        return view('dashboard',compact(['users','announcements']));
    }

    //

    
    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' =>'required',
            'new_password' =>'required|confirmed|min:8',
            
        ]);

        
        #MAtch The Old Password 
        # check bằng cách chọt vô database bằng Hash::check
        # input = old_password mà khác với password trong database thì triển : cảnh báo
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error","Old Password Doesn't match!");
        }


        #Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status","Password changed successfully!");
    }

    public function pdf()
    {
        $listOfUsers = DB::table('users')->get();
        $data = [
            'listOfUsers' => $listOfUsers
        ];
        $pdf = PDF::loadView('users.pdf', $data);
        
        return $pdf->download('listofusers.pdf');
        // return redirect('/departments');
    }
}
