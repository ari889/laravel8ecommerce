<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class FooterConponent extends Component
{
    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.footer-conponent', ['setting' => $setting]);
    }
}
