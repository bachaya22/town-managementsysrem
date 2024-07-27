<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddPlot;
class PlotController extends Controller
{
    public function plots(){
        return view('superadmin.content.plots.plot');
    }

    public function plotstore(Request $request)
    {


        $validated = $request->validate([
            'plotno' => 'required',
            'type' => 'required',
            'categories' => 'required',
            'length' => 'required',
            'width' => 'required',
            'marla' => 'required',
            'price' => 'required',
            'down_payment' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        // dd($validated);
        AddPlot::create($request->all());
        return redirect()->route('plot.show')->with('success','Plot details added Successfully');
    }


    public function plotshow()
    {

        $plots = AddPlot::all();
        return view('superadmin.content.plots.plotshow', compact('plots'));
    }

    public function edit(AddPlot $addPlot,$id)
    {
        $plots=AddPlot::find($id);
        // dd($plots);
        return view('superadmin.content.Plots.plotedit',compact('plots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddPlot $addPlot, $id)
    {
        $data = $request->validate([
            'plotno' => 'required',
            'type' => 'required',
            'categories' => 'required',
            'length' => 'required',
            'width' => 'required',
            'marla' => 'required',
            'price' => 'required',
            'down_payment' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $plots = AddPlot::find($id);
        $plots->update($data);

        return redirect()->route('plot.show')->with('success','Plot details Updated Successfully');
    }

    public function destroy(AddPlot $addPlot,$id)
    {

        $plotdelete=AddPlot::find($id);
        $plotdelete->delete();
        return redirect()->back();
    }
    public function status($id){
    $status = AddPlot::find($id);
    if($status){
        if($plot->status){

           $plot->status=0;
        }
        else{

         $plot->status=1;
        }
        $status->save();
     }
return back();
}
}
