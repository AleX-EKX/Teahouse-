<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TicketModel;

class TicketsController extends Controller
{
    public $tickets;

    public function __construct(Request $request) {
        $this->tickets = TicketModel::query();
    }

    public function TicketsMobileCreate(Request $request) {
        $ticket = new TicketModel;
        $ticket->dateCreate = \Carbon\Carbon::now();
        $ticket->status = 'new';
        $ticket->basket = json_decode($request->basket, true);
        $ticket->countPeople = $request->countPeoples;
        $ticket->numTable = $request->numTable;
        $ticket->idWaiter = Auth::user()->id;
        $ticket->save();

        return redirect()->route('ticketsMobile');
    }

    public function TicketsMobileGet() {
        return view('mobile.tickets.tickets');
    }

    public function TicketsAjax(Request $request) {
        $this->tickets->whereNull('dateClose')->whereNull('dateCancel');

        return view('mobile.tickets.ticketsAjax', [
            'tickets' => $this->tickets->get()
        ]);
    }

    public function TicketsMobileCancel($id, Request $request){
        $ticket = TicketModel::find($id);
        $ticket->dateCancel = \Carbon\Carbon::now();
        $ticket->save();

        return redirect()->route('ticketsMobile');
    }

    public function TicketsMobileComplete($id, Request $request){
        $ticket = TicketModel::find($id);
        $ticket->dateComplete = \Carbon\Carbon::now();
        $ticket->save();

        return redirect()->route('ticketsMobile');
    }

    


}
