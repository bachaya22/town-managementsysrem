<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function contactstore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'suggestion' => 'required',

        ]);
        // dd($validated);
        Contact::create($request->all());
        return redirect()->back()->with('contact', 'Thank You For Response Get In Touch 24/7');

    }
    public function contactshow()
{
    $contacts = Contact::all();
    return view('markting.content.contact.contact', compact('contacts'));
}
public function contactedit(Contact $contact,$id)
{
    $contacts=Contact::find($id);
    // dd($plots);
    return view('markting.content.contact.contactedit',compact('contacts'));
}
public function contactupdate(Request $request, Contact $contact,$id)
{
    $data= $request->validate([
        'name' => 'required',
        'phone_no' => 'required',
        'email' => 'required',
        'suggestion' => 'required',


     ]);
    $contacts=Contact::find($id);

    $contacts->update($data);

    return redirect()->route('visitor.home');
}

public function contactdestroy(Contact $contact,$id)
{
    $contactdelete=Contact::find($id);
    $contactdelete->delete();
    return redirect()->back();
}
}
