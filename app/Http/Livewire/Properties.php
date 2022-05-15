<?php

namespace App\Http\Livewire;

use App\Models\officesModel;
use App\Models\propertiesAttachmentsModel;
use App\Models\propertiesModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Properties extends Component
{

    public $listeners = [
        'deleteAlert' => 'propertyDelete',
        'propertiesFilter' => 'filter',
        ];
    public $properties;
    public $office;

    public function mount()
    {
        $this->properties = propertiesModel::where('office_id',Auth::user()->office_id)->get()->toArray();
        $this->office = officesModel::where('id',Auth::user()->office_id)->get()->toArray();
    }


    public function deleteAlert($id = 0)
    {
        if (propertiesModel::where('id', $id)->exists() && propertiesModel::where('id', $id)->first()->office_id == Auth::user()->office_id) {
            $this->dispatchBrowserEvent('swal:confirm-alert',
                [
                    'title' => 'هل انت متأكد ؟',
                    'text' => 'تريد حذف العقار , لن يمكنك الرجوع بعد الحذف',
                    'icon' => 'warning',
                    'confirmButtonText' => 'نعم , اريد الحذف !',
                    'cancelButtonText' => 'الغاء',
                    'id' => $id,
                    'method' => 'deleteAlert',
                ]
            );
        } else {
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'error',
                    'title' => 'عفوًا حدث خطأ :(',
                    'timer' => 2500,
                ]
            );
        }
    }

    public function propertyDelete($id = 0)
    {
        if (propertiesModel::where('id', $id)->exists() && propertiesModel::where('id', $id)->first()->office_id == Auth::user()->office_id) {
            propertiesAttachmentsModel::where('property_id', $id)->delete();
            propertiesModel::where('id', $id)->delete();
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'success',
                    'title' => 'تم حذف العقار :)',
                    'timer' => 2500,
                ]
            );
            $this->properties = propertiesModel::get()->toArray();
        } else {
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'error',
                    'title' => 'عفوًا حدث خطأ :(',
                    'timer' => 2500,
                ]
            );
        }
    }

    public function filter($filter)
    {
        switch ($filter) {
            case "asc":
                $this->properties = propertiesModel::orderBy('created_at', 'asc')->get();
                break;
            case "desc":
                $this->properties = propertiesModel::orderBy('created_at', 'desc')->get();
                break;
            default:
                $this->dispatchBrowserEvent('swal:toast-alert',
                    [
                        'icon' => 'error',
                        'title' => 'عفوًا حدث خطأ :(',
                        'timer' => 2500,
                    ]
                );
        }
    }

    public function render()
    {
        return view('livewire.dashboard.user.properties')->extends('livewire.dashboard.layouts.app');
    }
}
