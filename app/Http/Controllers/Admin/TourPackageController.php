<?php

namespace App\Http\Controllers\Admin;

use App\Models\TourPackage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTourPackageRequest;
use App\Http\Requests\UpdateTourPackageRequest;
use App\Models\TourModules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class TourPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tours.index');
        // ->with([
        //     'tours'=> TourPackage::all(),
        //     'modules'=> TourModules::all()
        // ])
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTourPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourPackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function show(TourPackage $tourPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(TourPackage $tourPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTourPackageRequest  $request
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourPackageRequest $request, TourPackage $tourPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourPackage $tourPackage)
    {
        //
    }
}