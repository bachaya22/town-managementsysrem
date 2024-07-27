<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        return view('superadmin.content.customer.create');
    }
    public function customerstore(Request $request)
    {
       // Validate the incoming request data
       $validatedData = $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Assuming you want to store images
        'name' => 'required|string',
        'email' => 'required|email',
        'cnic' => 'required|string',
        'phone' => 'required|string',

    ]);

    // Handle file upload if an image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads'), $imageName);
        $validatedData['image'] = $imageName;
    }

    // Create a new customer instance
    Customer::create($validatedData);

    // Redirect back or to a success page
    return redirect()->route('customer.show')->with('success','Customer details added Successfully');
}

    public function customershow()
    {
        $customers = Customer::all();
        return view('superadmin.content.customer.index', compact('customers'));
    }
    public function edit(Customer $customer)
{
    return view('superadmin.content.customer.edit', compact('customer'));
}
public function update(Request $request, Customer $customer)
{
    $validatedData = $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        'name' => 'required|string',
        'email' => 'required|email',
        'cnic' => 'required|string',
        'phone' => 'required|string',

    ]);

    // Handle file upload if an image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads'), $imageName);
        $validatedData['image'] = $imageName;
    }

    $customer->update($validatedData);

    return redirect()->route('customer.show')->with('success','Customer details updated Successfully');
}
public function destroy(Customer $customer)
{
    $customer->delete();

    return redirect()->route('customer.show')->with('success', 'Customer deleted Successfully');
}

}
