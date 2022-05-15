<?php

namespace App\Http\Livewire;

use App\Models\registerForm;
use App\Models\statusModel;
use App\Models\User;
use Livewire\Component;
use App\Models\officesModel;

class Offices extends Component
{

    public $listeners = [
        'officeFilter' => 'filter',
        'deleteAlert' => 'officeDelete',
    ];

    public $offices;

    public function mount()
    {
        $this->offices = officesModel::get();
    }

    public function updateRequest($id = 0, $status = 0)
    {
        if (officesModel::where('id', $id)->exists() && statusModel::where('id', $status)->exists()) {
            officesModel::where('id', $id)->update(['status' => $status]);
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'success',
                    'title' => 'تم تحديث الحالة :)',
                    'timer' => 2500,
                ]
            );
            $this->offices = officesModel::get();
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
                $this->offices = officesModel::orderBy('created_at', 'asc')->get();
                break;
            case "desc":
                $this->offices = officesModel::orderBy('created_at', 'desc')->get();
                break;
            case "on":
                $this->offices = officesModel::orderBy('status', 'asc')->get();
                break;
            case "off":
                $this->offices = officesModel::orderBy('status', 'desc')->get();
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

    public function deleteAlert($id = 0)
    {
        if (officesModel::where('id', $id)->exists() && User::where('office_id', $id)->exists()) {
            $this->dispatchBrowserEvent('swal:confirm-alert',
                [
                    'title' => 'هل انت متأكد ؟',
                    'text' => 'تريد حذف المكتب , لن يمكنك الرجوع بعد الحذف',
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

    public function officeDelete($id = 0)
    {
        if (officesModel::where('id', $id)->exists() && User::where('office_id', $id)->exists()) {
            User::where('office_id', $id)->delete();
            officesModel::where('id', $id)->delete();
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'success',
                    'title' => 'تم حذف المكتب :)',
                    'timer' => 2500,
                ]
            );
            $this->offices = officesModel::get();
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

    public function render()
    {
        return view('livewire.dashboard.admin.offices')->extends('livewire.dashboard.layouts.app');
    }
}
