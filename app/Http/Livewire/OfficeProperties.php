<?php

namespace App\Http\Livewire;

use App\Models\officesModel;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class OfficeProperties extends Component
{

    public function mount()
    {
        if(officesModel::where('slug', Route::getCurrentRoute()->slug)->exists())
            $this->officeInfo = officesModel::where('slug',Route::getCurrentRoute()->slug)->first()->toArray();
        else
            return redirect()->to(route('home'));
    }

    public function render()
    {
        return view('livewire.office-properties');
    }
}
