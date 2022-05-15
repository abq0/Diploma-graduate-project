<?php

namespace App\Http\Livewire;

use App\Models\categoriesModel;
use App\Models\City;
use App\Models\officesModel;
use App\Models\propertiesModel;
use Illuminate\Support\Arr;
use Livewire\Component;

class Home extends Component
{

    public $listeners = ['getInfo' => 'getInfo','filter'=>'filter'];

    public $allProperties = [];
    public $allOffices = [];
    public $cardTitle = '';
    public $cities;
    public $categories;

    public function mount(){
        $this->cities = City::get()->toArray();
        $this->categories = categoriesModel::get()->toArray();
    }

    public function getInfo($id)
    {
        $this->reset();
        if ($id == 1) {
            $this->allOffices = officesModel::where('status',4)->get()->toArray();
            $this->cardTitle = 'جميع المكاتب';
        } else {
            $this->allProperties = propertiesModel::get()->toArray();
            $this->cardTitle = 'جميع العقارات';
        }
        $this->cities = City::get()->toArray();
        $this->categories = categoriesModel::get()->toArray();
    }

//    public function filter(){
//
//    }

    public function render()
    {
        return view('livewire.home')->extends('layouts.app');
    }
}
