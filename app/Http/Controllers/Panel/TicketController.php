<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\RandomUniqueCode;
use App\Http\Requests\Panel\Ticket\CreateTicketRequest;
use App\Http\Requests\Panel\Ticket\ReplyTicketRequest;
use App\Models\Ticket;

class TicketController extends Controller
{

    public function index()
    {
        if (auth()->user()->role_id == 1){
            $tickets = Ticket::where('ticket_id',null)->orderByDesc('id')->paginate(5);
        } else {
            $tickets = auth()->user()->tickets()->where('ticket_id',null)->orderByDesc('id')->paginate(5);
        }

        return view('panel.tickets.index',compact('tickets'));
    }

    public function create()
    {
        return view('panel.tickets.create');
    }

    public function store(CreateTicketRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['code'] = RandomUniqueCode::randomString(6);
        Ticket::create(
            $data
        );
        $request->session()->flash('status','تیکت جدید با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return to_route('tickets.index');
    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        $tickets = $ticket->children()->get();
        return view('panel.tickets.show',compact(['ticket','tickets']));
    }

    public function reply(ReplyTicketRequest $request,Ticket $ticket)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['ticket_id'] = $ticket->id;
        Ticket::create(
            $data
        );

        if(auth()->user()->id != $ticket->user_id && auth()->user()->role_id == 1){
            $ticket->update([
                'status' => 1
            ]);
        } else {
            $ticket->update([
                'status' => 0
            ]);
        }

        $request->session()->flash('status','تیکت شما با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return to_route('tickets.index');
    }
}
