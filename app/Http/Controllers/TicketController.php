<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tickets;
use App\Models\Tour;
use App\Models\ToursModule;

class TicketController extends Controller
{
    public function index(){

        return view('user.tickets.index')->with([
            'tours' => Tour::all(),
            'tickets' =>Tickets::latest()->get(),
        ]);
    }

    public function cancel(Request $request, $id)
    {
        // dd($request);
        $ticket = Tickets::find($id);
        if(!$ticket){
            $request->session()->flash('error', 'Ticket Cannot be Canceled.');
            return redirect(url('/tickets'));
        }
        $ticket->update($request->except('_token'));
        $request->session()->flash('success', 'Ticket has been Canceled.');
        return redirect(url('/tickets'));
    }

    public function print($id){

        return view('user.tickets.print')->with([
            'ticket' =>Tickets::find($id),
            'tour' => Tour::find($id = Tickets::find($id)->tour_id),
            'module' => ToursModule::find($tour_id = Tickets::find($id)->tour_id),
        ]);
    }
}