<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\SupportTicketAdminEmail;
use Illuminate\Support\Facades\Mail;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supportTickets = SupportTicket::all()->where('created_by', auth()->user()->id);
        return view('customer-dashboard', ['supportTickets' => $supportTickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.support-ticket.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $inputs = $request->all();
            $inputs['created_by'] = auth()->user()->id;

            DB::beginTransaction();
            $supportTicket = SupportTicket::create($inputs);
            DB::commit();

            Mail::to('admin@mail.com')->send(new SupportTicketAdminEmail(auth()->user()->name, $supportTicket));

            return redirect()->back()->with('success', 'Support Ticket Opened Successfully!');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', "Couldn't Add Support Ticket");
        }

    }

    public function show($ticketId)
    {
        $supportTicket = SupportTicket::where('id', $ticketId)->first();
        return view('customer.support-ticket.show', ['supportTicket' => $supportTicket]);
    }
}
