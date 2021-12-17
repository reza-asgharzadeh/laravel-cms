<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Http\Requests\Panel\Ticket\CreateTicketRequest;
use App\Http\Requests\Panel\Ticket\ReplyTicketRequest;
use App\Models\Ticket;

class TicketController extends Controller
{

    public function index()
    {
        $role_id = auth()->user()->role_id;
        $user_id = auth()->user()->id;
        if ($role_id == 1){
            $tickets = Ticket::where('user_id',$user_id)->where('ticket_id',null)->paginate(5);
        } else {
            $tickets = Ticket::where('ticket_id',null)->paginate(5);
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
        $data['code'] = Helper::generateUniqueNumber();
        Ticket::create(
            $data
        );
        $request->session()->flash('status','تیکت جدید با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return back();
    }

    public function show(Ticket $ticket)
    {
        $role_id = auth()->user()->role_id;
        $user_id = auth()->user()->id;
        if ($role_id == 1){
            $tickets = Ticket::where('user_id',$user_id)->where('ticket_id',null)->paginate(5);
        } else {
            $tickets = Ticket::where('id',$ticket->id)->where('ticket_id',null)->paginate(5);
        }

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
        if (auth()->user()->role_id == 2){
            $ticket->update([
                'status' => true
            ]);
        } else {
            $ticket->update([
                'status' => false
            ]);
        }
        $request->session()->flash('status','تیکت شما با موفقیت ثبت شد!');
        return back();
    }
}
