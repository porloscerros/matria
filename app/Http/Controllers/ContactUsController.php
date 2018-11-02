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

    public function mailToAdmin(ContactUsRequest $request): RedirectResponse
    {
        $data = [];

        $data['name'] = $request->get('name');
        $data['email'] = $request->get('email');
        $data['msg'] = $request->get('msg');

        Mail::to(env('ADMIN_EMAIL'), env('ADMIN_NAME'))->send(new ContactUsMessage($data));

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:emails|max:255',
        ]);
        if (!$validator->fails()) {
            $this->store($data);
        }

        return redirect()->route('home', [ '#home-contact-us' ])->withSuccess(__('contact-us.sended'));
    }

    private function store($data)
    {
        $contact = Contact::create(['name' => $data['name']]);
        $email = Email::firstOrNew(['contact_id' => $contact->id, 'email' => $data['email'], 'default' => true]);
        $email->save();
    }
}
