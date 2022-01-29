<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required',
            'comment' => 'required|max:50000|string'
        ]);
    }

    public function sendMessage(){
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'nullable',
            'comment' => 'nullable|max:50000|string'
        ]);

        $contact = new Contact();

        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();
        session()->flash('message', 'Thanks for your message has been send successfully!');
    }

    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}
