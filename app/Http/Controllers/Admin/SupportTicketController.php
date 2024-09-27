<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportTicketCustomerEmail;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supportTickets = SupportTicket::with('user')->get();
        return view('admin-dashboard', ['supportTickets' => $supportTickets]);
    }

    public function show($ticketId)
    {
        $supportTicket = SupportTicket::where('id', $ticketId)->with('user')->first();
        return view('admin.show', ['supportTicket' => $supportTicket]);
    }

    public function edit($ticketId)
    {
        $supportTicket = SupportTicket::where('id', $ticketId)->with('user')->first();
        return view('admin.edit', ['supportTicket' => $supportTicket]);
    }

    public function update(Request $request, $ticketId)
    {
        try {
            $inputs = $request->except(['_token', '_method']);
            $inputs['resolved_by'] = auth()->user()->id;
            $inputs['status'] = "CLOSED";

            DB::beginTransaction();

            SupportTicket::where('id', $ticketId)
                ->update($inputs);

            DB::commit();

            $supportTicket = SupportTicket::where('id', $ticketId)->first();
            Mail::to(auth()->user()->email)->send(new SupportTicketCustomerEmail($supportTicket));

            return redirect()->route('admin.dashboard')->with('success', 'Support Ticket Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', "Couldn't Update Support Ticket");
        }
    }

}
