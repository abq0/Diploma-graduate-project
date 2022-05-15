<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\officesModel;
use App\Models\registerForm;
use App\Models\statusModel;
use Livewire\Component;
use App\Models\User;

class CreateRequests extends Component
{

    protected $listeners = ['updateRequestStatus' => 'updateRequest'];

    public $cities;
    public $requests;

    public function mount()
    {
        $this->cities = City::get()->toArray();
        $this->requests = registerForm::where('status', 1)->get();
    }

    public function updateRequest($id = 0, $status = 0)
    {
        if (registerForm::where('id', $id)->exists() && statusModel::where('id', $status)->exists()) {
            registerForm::where('id', $id)->update(['status' => $status]);
            $data = registerForm::where('id', $id)->first()->toArray();
            if ($status == 3) {
                $this->dispatchBrowserEvent('swal:toast-alert',
                    [
                        'icon' => 'error',
                        'title' => 'تم رفض الطلب :(',
                        'timer' => 2500,
                    ]
                );
            } else {
                $officeData = officesModel::create([
                    'password' => bin2hex(random_bytes(8)),
                    'name' => $data['officeName'],
                    'slug' => $data['urlSlug'],
                    'views' => 0,
                    'city' => $data['officeCity'],
                    'district' => $data['district'],
                    'street' => $data['street'],
                    'status' => 4,
                ]);
                User::create([
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'email' => $data['email'],
                    'isAdmin' => 0,
                    'password' => bcrypt($officeData['password']),
                    'mobileNumber' => $data['mobileNumber'],
                    'office_id' => $officeData['id'],
                    'city' => $data['city'],
                ]);
                $this->dispatchBrowserEvent('swal:toast-alert',
                    [
                        'icon' => 'success',
                        'title' => 'تم قبول الطلب :)',
                        'timer' => 2500,
                    ]
                );
            }
            $this->requests = registerForm::where('status', 1)->get();
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

    public function refuseAlert($id = 0)
    {
        if (registerForm::where('id', $id)->exists()) {
            $this->dispatchBrowserEvent('swal:confirm-alert',
                [
                    'title' => 'هل انت متأكد ؟',
                    'text' => 'تريد رفض الطلب , لن يمكنك الرجوع بعد الرفض',
                    'icon' => 'warning',
                    'confirmButtonText' => 'نعم , اريد الرفض !',
                    'cancelButtonText' => 'الغاء',
                    'id' => $id,
                    'status' => 3,
                    'method' => 'updateRequestStatus',
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

    public function render()
    {
        return view('livewire.dashboard.admin.create-requests')->extends('livewire.dashboard.layouts.app');
    }
}
