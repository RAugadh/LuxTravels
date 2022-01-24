<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\ToursModule;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tours.index')->with([
            'tours' => Tour::all(),
            'modules' => ToursModule::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tours.create')->with([
            'tours' => Tour::all(),
            'modules' => ToursModule::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $tour = new Tour();


        $tour->name = $request->name;
        $tour->sub = $request->sub;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->highlight = $request->highlight;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/tours', $filename);
            $tour->image = $filename;
        }
        $tour->save();

        $modules = new ToursModule();
        $modules->tour_id = $tour->id;
        $modules->module_1 = $request->module_1;
        $modules->module_2 = $request->module_2;
        $modules->module_3 = $request->module_3;
        $modules->module_4 = $request->module_4;
        $modules->module_5 = $request->module_5;
        $modules->save();


        return redirect(route('admin.tours.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Tour::destroy($id);
        ToursModule::destroy('tour_id' == $id);

        return redirect(route('admin.tours.index'));
    }
}