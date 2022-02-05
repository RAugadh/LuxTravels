<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Tour;
use App\Models\User;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tickets.index')->with(
            [
                'tickets' => Tickets::all(),
                'tours' => Tour::all(),
                'users' => User::all(),
            ]
            );
    }
    public function cancel(Request $request, $id)
    {
        // dd($request);
        $ticket = Tickets::find($id);
        if(!$ticket){
            $request->session()->flash('error', 'Ticket Cannot be Canceled.');
            return redirect(route('admin.tickets.index'));
        }
        $ticket->update($request->except('_token'));
        $request->session()->flash('success', 'Ticket has been Canceled.');
        return redirect(route('admin.tickets.index'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tickets::find($id);

        return view('admin.tickets.edit')->with([
            'ticket' => $data,
            'tour' => Tour::find($id = $data->tour_id),
            'user' => User::find($id = $data->user_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $ticket = Tickets::find($id);
        if(!$ticket){
            $request->session()->flash('error', 'Ticket Cannot be edited.');
            return redirect(route('admin.tickets.index'));
        }
        $ticket->update($request->except('_token'));
        $request->session()->flash('success', 'Ticket has been Reviewed.');
        return redirect(route('admin.tickets.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}