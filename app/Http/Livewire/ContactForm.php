<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public  $name, $email, $body,$data=[],$selected_id;
    public $updateMode = false;

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->body = null;
        return redirect()->to('/form');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'body' => 'required',
        ]);
        Contact::create($validatedData);
        $this->resetInput();
        
    }
    public function render()
    {
        $this->data = Contact::all();
        return view('livewire.contact-form');
    }
    public function edit($id)
    {
        $record = Contact::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->body = $record->body;
        $this->updateMode = true;
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',
        ]);

        if ($this->selected_id) {
            $user = Contact::find($this->selected_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'body' => $this->body,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInput();
        }
        
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Contact::where('id', $id);
            $record->delete();
        }
    }
}
