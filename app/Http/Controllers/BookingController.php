<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\AddPlot;
use App\Models\Booking;
class BookingController extends Controller
{

    public function create()
    {
        $customers = Customer::all();
        $plots = AddPlot::whereDoesntHave('booking', function ($query) {
            $query->where('status', 'booked');
        })->get();
// dd($customers);
        return view('superadmin.content.booking.create',compact('customers','plots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'email' => 'required|email',
            'cnic' => 'required',
            'phone' => 'required',
            'add_plot_id' => 'required',
            'marla' => 'required',
            'plot_type' => 'required',
            'categories' => 'required',
            'total_amount' => 'required',
            'payment_type' => 'required',
            'status' => 'required',
        ]);

        $booking = new Booking([
            'customer_id' => $request->input('customer_id'),
            'email' => $request->input('email'),
            'cnic' => $request->input('cnic'),
            'phone' => $request->input('phone'),
            'add_plot_id' => $request->input('add_plot_id'),
            'marla' => $request->input('marla'),
            'plot_type' => $request->input('plot_type'),
            'categories' => $request->input('categories'),
            'total_amount' => $request->input('total_amount'),
            'payment_type' => $request->input('payment_type'),
            'num_installments' => $request->input('num_installments'),
            'installment_payment' => $request->input('installment_payment'),
            'total_payment' => $request->input('total_payment'),
            'status' => $request->input('status'),
        ]);

        $booking->save();

        $customers = Customer::all();
        $plots = AddPlot::all();
        return redirect()->route('booking.show')->with('success', 'Plot Booking added Sucessfully');
    }


    public function bookingindex()
    {
        $bookings = Booking::all();
        return view('superadmin.content.booking.index', compact('bookings'));
    }
    public function destroy(Booking $booking,$id)
    {

        $bookingdelete=booking::find($id);
        $bookingdelete->delete();
        return redirect()->back();
    }
    public function edit(Booking $booking,$id)
    {

        $bookings=$booking::find($id);
        $customers = Customer::all();
        $plots = AddPlot::all();
        // dd($plots);

        return view('superadmin.content.booking.edit',compact('bookings','customers','plots'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'email' => 'required|email',
            'cnic' => 'required',
            'phone' => 'required',
            'add_plot_id' => 'required',
            'marla' => 'required',
            'plot_type' => 'required',
            'categories' => 'required',
            'total_amount' => 'required',
            'payment_type' => 'required',
            'status' => 'required',
        ]);

        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking details
        $booking->customer_id = $request->input('customer_id');
        $booking->email = $request->input('email');
        $booking->cnic = $request->input('cnic');
        $booking->phone = $request->input('phone');
        $booking->add_plot_id = $request->input('add_plot_id');
        $booking->marla = $request->input('marla');
        $booking->plot_type = $request->input('plot_type');
        $booking->categories = $request->input('categories');
        $booking->total_amount = $request->input('total_amount');
        $booking->payment_type = $request->input('payment_type');
        $booking->num_installments = $request->input('num_installments');
        $booking->installment_payment = $request->input('installment_payment');
        $booking->total_payment = $request->input('total_payment');
        $booking->status = $request->input('status');

        // Save the updated booking
        $booking->save();



        return redirect()->route('booking.show')->with('success', 'Plot Booking Updated Sucessfully');
    }


}
