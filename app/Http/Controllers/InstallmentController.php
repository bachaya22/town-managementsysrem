<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Installment;
class InstallmentController extends Controller
{
    public function create()
    {
        $bookings = Booking::whereDoesntHave('installments')->where('payment_type', '!=', 'full_payment')->get();
        return view('superadmin.content.installment.create', compact('bookings'));
    }

    public function installmentmail()
    {
        return view('superadmin.content.installment.mail', compact('bookings'));
    }

    public function getInstallments($booking_id)
    {
        $installments = Installment::where('booking_id', $booking_id)->get();
        return response()->json($installments);
    }


    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'total_amount' => 'required|numeric',
            'num_installments' => 'required|integer|min:1',
            'installment_payment' => 'required|numeric',
            'installment_type' => 'required',
        ]);

        $installmentNoCount = 0;
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'installment_no_') === 0) {
                $installmentNoCount++;
            }
        }


        $booking = Booking::findOrFail($request->booking_id);

        for ($i = 1; $i <= $installmentNoCount; $i++) {
            $request->validate([
                "installment_no_$i" => 'required',
                "installment_email_$i" => 'required',
                "installment_amount_$i" => 'required',
                "installment_date_$i" => 'required',
                "installment_status_$i" => 'required',
            ]);

            $installment = new Installment();
            $installment->booking_id = $booking->id;
            $installment->installment_no = $request->input("installment_no_$i");
            $installment->email = $request->input("installment_email_$i");
            $installment->installment_amount = $request->input("installment_amount_$i");
            $installment->date = $request->input("installment_date_$i");
            $installment->installment_status = $request->input("installment_status_$i");
            $installment->save();
        }

        return redirect()->route('ins.index')->with('success', 'Installment added Successfully');
    }
    public function index()
    {
        $installments = Installment::all();
        return view('superadmin.content.installment.index', compact('installments'));
    }

    public function destroy($id)
    {
        // Find the invoice by its ID
        $installment = Installment::find($id);

        if (!$installment) {
            return redirect()->route('ins.index')->with('error', 'Installment not found.');
        }

        // Delete related orders first
        $installment->booking()->delete();

        // Then, delete the invoice
        $installment->delete();

        return redirect()->route('ins.index')->with('success', 'Installment and Booking deleted Successfully');
    }
   // app/Http/Controllers/InstallmentController.php


        }

