<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Email;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Admin\ContactsRequest;

class ContactController extends Controller
{
    /**
     * Show the application contacts index.
     */
    public function index(): View
    {
        $contacts = Contact::paginate(20);

        return view('admin.contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.contacts.create');
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Contact $contact): View
    {
        $email = $contact->defaultEmail ? $contact->defaultEmail->email : '';
        return view('admin.contacts.edit', [
            'contact' => $contact,
            'email' => $email
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactsRequest $request): RedirectResponse
    {
        $contact = Contact::create(['name' => $request->get('name')]);

        if($request->email) {
            $email = Email::firstOrNew(['contact_id' => $contact->id, 'email' => $request->email, 'default' => $request->default]);
            $email->save();
        }

        return redirect()->route('admin.contacts.edit', $contact)->withSuccess(__('contacts.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactsRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->only(['name']));

        if ($request->email && $contact->defaultEmail)
            $contact->defaultEmail->update($request->only(['email']));

        if ($request->email && !$contact->defaultEmail)
            Email::create(['contact_id' => $contact->id, 'email' => $request->email, 'default' => $request->default]);

        if (!$request->email && $contact->defaultEmail)
            $contact->defaultEmail->delete();

        return redirect()->route('admin.contacts.edit', $contact)->withSuccess(__('contacts.updated'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Contact $contact): View
    {
        return view('admin.contacts.show', [
            'contact' => $contact
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact  $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->withSuccess(__('contacts.deleted'));
    }
}
