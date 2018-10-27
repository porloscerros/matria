<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUsMessage;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactUsRequest;
use Mail;
use Validator;
use App\Models\Contact;
use App\Models\Email;

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

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:emails|max:255',
        ]);

        if (!$validator->fails()) {
            $contact = Contact::create(['name' => $request->get('name')]);
            $email = Email::firstOrNew(['contact_id' => $contact->id, 'email' => $request->email, 'default' => true]);
            $email->save();
        }

        $this->mailToAdmin($contact);

        return redirect()->route('contact')->withSuccess(__('contact-us.sended'));
    }

    private function mailToAdmin($message)
    {
        Mail::to(env('ADMIN_EMAIL'), env('ADMIN_NAME'))->send(new ContactUsMessage($message));

        return redirect('/#contact')->withSuccess('Su mensaje ha sido enviado con éxito.');
    }
}
