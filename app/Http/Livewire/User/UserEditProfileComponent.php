<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $newimage;

    public function mount(){
        $user = User::find(Auth::user()->id);
        $this->name  = $user->name;
        $this->email  = $user->email;
        $this->mobile  = $user->profile->mobile;
        $this->image  = $user->profile->image;
        $this->line1  = $user->profile->line1;
        $this->line2  = $user->profile->line2;
        $this->city  = $user->profile->city;
        $this->province  = $user->profile->province;
        $this->country  = $user->profile->country;
        $this->zipcode  = $user->profile->zipcode;
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'mobile' => 'nullable',
            'line1' => 'nullable|string',
            'line2' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'country' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg.gif',
            'zipcode' => 'nullable|integer',
        ]);
    }

    public function updateProfile(){
        $this->validate([
            'name' => 'required|string',
            'mobile' => 'nullable',
            'line1' => 'nullable|string',
            'line2' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'country' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg.gif',
            'zipcode' => 'nullable|integer',
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        $user->profile->mobile = $this->mobile;
        if($this->newimage){
            if($this->image){
                if(file_exists(public_path('assets/images/profile/'.$this->image))){
                    unlink(public_path('assets/images/profile/'.$this->image));
                }
            }
            $imagename = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('profile', $imagename);
            $user->profile->image = $imagename;
        }
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->province = $this->province;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        $user->profile->save();

        session()->flash('message', 'Profile updated successfully!');
    }


    public function render()
    {
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');
    }
}
