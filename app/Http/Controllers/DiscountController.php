<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function discountstore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'plot_merla' => 'required',

        ]);
        // dd($validated);
        Discount::create($request->all());
        return redirect()->back()->with('success', 'Your Discount Form Sumbit Our Marketing Team Contact With.');

    }
    public function index(){
        $discounts = Discount::all();
    return view('markting.content.discount.customer_detail', compact('discounts'));
    }

    public function destroy($id)
{
    $discount = Discount::findOrFail($id);
    $discount->delete();

    return redirect()->route('discount.show')->with('success', 'Customer deleted successfully');
}

}
