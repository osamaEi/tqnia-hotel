<?php

namespace App\Http\Controllers\Employee;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function EmployeeDashboard() {


        return view('employee.index');

    }
  public function  roomsView() {
    $rooms = Room::with('roomType')->get(); 


    return view('employee.room.index',compact('rooms'));


  }

  public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
