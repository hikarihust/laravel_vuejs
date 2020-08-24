<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return request()->user()->contacts;
    }

    public function store()
    {

        $data = $this->validateData();

        Contact::create($data);
    }

    public function show(Contact $contact)
    {
        if(request()->user()->isNot($contact->user)) {
            return response([], 403);
        }

        return $contact;
    }

    public function update(Contact $contact)
    {
        $data = $this->validateData();

        $contact->update($data);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'company' => 'required',
        ]);
    }
}
