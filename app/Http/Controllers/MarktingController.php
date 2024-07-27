<?php

namespace App\Http\Controllers;
use App\Models\Discount;
use App\Models\Contact;
use Illuminate\Http\Request;

class MarktingController extends Controller
{
    public function dashboard()
    {
        $discounts = Discount::count();
        $contacts = Contact::count();
        return view('markting.content.home',compact('discounts','contacts'));
    }
}
