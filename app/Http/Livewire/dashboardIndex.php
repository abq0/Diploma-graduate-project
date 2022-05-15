<?php

namespace App\Http\Livewire;

use App\Models\categoriesModel;
use App\Models\officesModel;
use App\Models\propertiesModel;
use App\Models\registerForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class dashboardIndex extends Component
{

    public $offices;
    public $categories;
    public $requests;
    public $propertiesCount;

    public function mount(){
        // admin
        $this->offices = officesModel::orderBy('views', 'desc')->get()->toArray();
        $this->categories = categoriesModel::orderBy('views', 'desc')->get()->toArray();
        $this->requests = registerForm::where('status',1)->count();
        $this->propertiesCount = propertiesModel::count();
        // user
    }

    public function render()
    {
        return view('livewire.dashboard.admin.index')->extends('livewire.dashboard.layouts.app');
    }
}
