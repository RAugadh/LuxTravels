<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Tour;
use App\Models\ToursModule;
use App\Models\Tickets;

class BookingController extends Controller
{

    public function index()
    {
        return view('user.book.index')->with([
            'tours' => Tour::all(),
            'modules' => ToursModule::all()
        ]);
    }

    public function ticket($id)
    {
        $tour_id = $id;

        return view('user.book.ticket')->with([
            'tour' => Tour::find($id),
            'module' => ToursModule::find($tour_id)
        ]);
    }

    public function store(Request $request, $user_id, $tour_id)
    {
        $validator = Validator::make($request->all(), [
            'passengers' => 'required',
            'boarding_date' => 'required',
            'boarding_date' => 'required',
            'boarding_at' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Input Valid Information');
            return redirect()->back();
        }
        $data = $request->all();
        $id = $tour_id;
        $tour = Tour::find($id);

        $ticket = new Tickets();
        $ticket->passengers = $data['passengers'];
        $ticket->boarding_date = $data['boarding_date'];
        $ticket->boarding_at = $data['boarding_at'];
        $ticket->total_price = $tour->price * 1.18;
        if($request->has('diet')){
            $ticket->diet = $data['diet'];
        }
        else{
            $ticket->diet = null;
        }
        $ticket->user_id = $user_id;
        $ticket->tour_id = $tour_id;

        $ticket->save();

        $request->session()->flash('success', 'The Tour has been Booked.');
        return redirect(url('/book'));
    }
}