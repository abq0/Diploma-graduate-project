<?php

namespace App\Http\Livewire;

use App\Models\officesModel;
use App\Models\propertiesAttachmentsModel;
use App\Models\propertiesModel;
use Livewire\Component;

class propertiesDetails extends Component
{

    public $office;
    public $property;
    public $propertyImages;

    public function mount($slug, $id)
    {
        if (officesModel::where('slug', $slug)->exists()) {
            $this->office = officesModel::where('slug', $slug)->get()->toArray();
            if (propertiesModel::where('id', $id)->exists()) {
                $this->property = propertiesModel::where('id', $id)->get()->toArray();
                $this->propertyImages = propertiesAttachmentsModel::where('property_id', $id)->get()->toArray();
            } else {
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function render()
    {
        return view('livewire.properties-details')->extends('layouts.app');
    }
}
