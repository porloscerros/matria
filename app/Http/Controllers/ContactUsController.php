<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUsMessage;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactUsRequest;
use Mail;

class ContactUsController extends Controller
{

    public function show()
    {
        return view('contact-us.contact');
    }

    public function store(ContactUsRequest $request): RedirectResponse
    {
        $contact = [];

        $contact['name'] = $request->get('name');
        $contact['email'] = $request->get('email');
        $contact['msg'] = $request->get('msg');

        //save to contacts table

        $this->mailToAdmin($contact);

        return redirect()->route('contact')->withSuccess(__('contact-us.sended'));
    }

    private function mailToAdmin($message)
    {
        \Mail::to(env('ADMIN_EMAIL'), env('ADMIN_NAME'))->send(new ContactUsMessage($message));

        return redirect('/#contact')->withSuccess('Su mensaje ha sido enviado con éxito.');
    }
}
