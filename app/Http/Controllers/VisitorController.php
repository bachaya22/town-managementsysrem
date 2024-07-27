<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddPlot;
use App\Models\User;
use App\Models\Installment;
use Illuminate\Support\Facades\Auth;
class VisitorController extends Controller
{
    public function home(){

        return view('visitor.content.home');
    }
    public function plot(){
        $plots = AddPlot::all();
        return view('visitor.content.plot', compact('plots'));
    }
    public function discount(){
        $plots = AddPlot::all();
        return view('visitor.content.discount', compact('plots'));
    }
    public function contact(){
        return view('visitor.content.contact');
    }
    public function getInstallmentsByUserEmail(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not logged in');
        }

        $email = $user->email;

        // Retrieve installments for the logged-in user
        $installments = Installment::where('email', $email)->with('booking.customer')->get();

        return view('visitor.content.installment', compact('installments'));
    }
}
