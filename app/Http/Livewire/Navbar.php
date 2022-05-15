<?php

namespace App\Http\Livewire;

use App\Models\officesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{

    public $officeInfo;

    public function mount()
    {
        if(officesModel::where('slug', Route::getCurrentRoute()->slug)->exists())
            $this->officeInfo = officesModel::where('slug',Route::getCurrentRoute()->slug)->first()->toArray();
        else
            return redirect()->to(route('home'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
