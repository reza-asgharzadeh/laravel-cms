<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Contact\CreateContactRequest;
use App\Http\Requests\Panel\Contact\ReplyContactRequest;
use App\Http\Requests\Panel\Contact\UpdateContactRequest;
use App\Mail\ContactUsEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $parentContacts = Contact::where('contact_id',null)->orderByDesc('id')->paginate(5);
        $childrenContacts = Contact::where('contact_id','!=',null)->orderByDesc('id')->paginate(5);
        return view('panel.contacts.index',compact('parentContacts','childrenContacts'));
    }

    public function store(CreateContactRequest $request)
    {
        $data = $request->validated();
        Contact::create(
            $data
        );

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUsEmail($request->name,$request->email,$request->get('content')));

        $request->session()->flash('status','پیام شما ارسال شد، پاسخ از طریق ایمیل برایتان ارسال خواهد شد!');
        return back();
    }

    public function showPage()
    {
        return view('client.contact');
    }

    public function reply(Contact $contact)
    {
//        Gate::authorize('reply-comments');

        return view('panel.contacts.reply',compact('contact'));
    }

    public function save(ReplyContactRequest $request, Contact $contact)
    {
//        Gate::authorize('save-comment');

        Contact::create([
            'name' => auth()->user()->name,
            'email' => env('MAIL_FROM_ADDRESS'),
            'content' => $request->get('content'),
            'contact_id' => $contact->id,
            'user_id' => auth()->user()->id
        ]);

        Mail::to($contact->email)->send(new ContactUsEmail($request->name,$request->email,$request->get('content')));

        $request->session()->flash('status','پاسخ فرم تماس مورد نظر با موفقیت ایجاد شد !');
        return to_route('contact-us.index');
    }

    public function edit(Contact $contact_u)
    {
        return view('panel.contacts.edit',compact('contact_u'));
    }

    public function update(UpdateContactRequest $request, Contact $contact_u)
    {
        $contact_u->update([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->get('content')
        ]);

        $request->session()->flash('status','فرم تماس مورد نظر با موفقیت ویرایش شد !');
        return to_route('contact-us.index');
    }

    public function destroy(Contact $contact_u, Request $request)
    {
        $contact_u->delete();
        $request->session()->flash('status','فرم تماس مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
