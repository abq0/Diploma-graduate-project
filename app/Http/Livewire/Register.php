<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  App\Models\City;
use App\Models\registerForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Register extends Component
{

    use LivewireAlert;

    public $currentStep = 0;

    public $form = [
        'firstName' => '',
        'lastName' => '',
        'mobileNumber' => '',
        'email' => '',
        'city' => '',
        'officeName' => '',
        'officeCity' => '',
        'street' => '',
        'district' => '',
        'urlSlug' => '',
        'status' => 1, // waiting status
    ];

    // error messages
    protected $messages = [
        'form.firstName.max' => 'الاسم الاول 255 خانة كحد أقصى',
        'form.lastName.max' => 'الاسم الاخير 255 خانة كحد أقصى',
        'form.officeName.max' => 'اسم المكتب 255 خانة كحد أقصى',
        'form.street.max' => 'اسم الشارع 300 خانة كحد أقصى',
        'form.district.max' => 'اسم الحي 300 خانة كحد أقصى',
        'form.urlSlug.max' => 'الرابط المخصص 255 خانة كحد أقصى',
        'form.email.max' => 'البريد الإلكتروني 255 خانة كحد أقصى',
        'form.firstName.required' => 'الاسم الاول مطلوب',
        'form.lastName.required' => 'الاسم الاخير مطلوب',
        'form.officeName.required' => 'اسم المكتب مطلوب',
        'form.street.required' => 'اسم الشارع مطلوب',
        'form.district.required' => 'اسم الحي مطلوب',
        'form.urlSlug.required' => 'البيانات الإضافية مطلوب',
        'form.mobileNumber.required' => 'رقم الهاتف مطلوب',
        'form.mobileNumber.numeric' => 'رقم الهاتف ارقام فقط',
        'form.mobileNumber.digits_between' => 'رقم الهاتف يكون 9 خانات',
        'form.email.required' => 'البريد الإلكتروني مطلوب',
        'form.email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
        'form.email.unique' => 'البريد الإلكتروني مستعمل مسبقًا',
        'form.firstName.regex' => 'الاسم الاول بالعربي فقط',
        'form.lastName.regex' => 'الاسم الاخير بالعربي فقط',
        'form.officeName.regex' => 'اسم المكتب بالعربي فقط',
        'form.street.regex' => 'اسم الشارع بالعربي فقط',
        'form.district.regex' => 'اسم الحي بالعربي فقط',
        'form.urlSlug.regex' => 'الرابط المخصص  بالاحرف الانجليزيه و الارقام فقط بدون مسافات او رموز',
        'form.urlSlug.unique' => 'الرابط المخصص مستخدم من قبل',
        'form.city.exists' => 'المدينة المختارة غير صحيحة',
        'form.officeCity.exists' => 'المدينة المختارة غير صحيحة',
        'form.officeCity.numeric' => 'المدينة المختارة غير صحيحة',
        'form.city.numeric' => 'المدينة المختارة غير صحيحة',
        'form.city.required' => 'المدينة مطلوبه',
        'form.officeCity.required' => 'مدينة المكتب مطلوبه',
    ];

    public $cities;

    public function mount()
    {
        $this->cities = City::get()->toArray();
    }

    public function create()
    {
        $this->validate([
            'form.firstName' => 'required|max:255|regex:/^[ ء-ي]+$/u',
            'form.lastName' => 'required|max:255|regex:/^[ء-ي ]+$/u',
            'form.mobileNumber' => 'required|numeric|digits_between:9,9',
            'form.email' => 'required|max:255|email|unique:application_form,email',
            'form.city' => 'required|exists:cities,id|numeric',
            'form.officeName' => 'required|max:255|regex:/^[ء-ي ]+$/u',
            'form.street' => 'required|max:300|regex:/^[ ء-ي]+$/u',
            'form.district' => 'required|max:300|regex:/^[ء-ي ]+$/u',
            'form.urlSlug' => 'max:255|regex:/^[a-zA-z0-9]+$/u|unique:application_form,urlSlug',
            'form.officeCity' => 'required|exists:cities,id|numeric',
        ]);
        registerForm::Create([
            'firstName' => $this->form['firstName'],
            'lastName' => $this->form['lastName'],
            'mobileNumber' => $this->form['mobileNumber'],
            'email' => $this->form['email'],
            'city' => $this->form['city'],
            'officeName' => $this->form['officeName'],
            'officeCity' => $this->form['officeCity'],
            'street' => $this->form['street'],
            'district' => $this->form['district'],
            'urlSlug' => !empty($this->form['urlSlug']) ? $this->form['urlSlug'] : $this->generateUniqueSlug(),
            'status' => 1,
        ]);
        $this->dispatchBrowserEvent('swal:toast-alert',
            [
                'icon' => 'success',
                'title' => 'تم إرسال طلبك :)',
                'timer' => 2500,
            ]
        );
        $this->dispatchBrowserEvent('showRepeatDiv');
    }

    public function goToNextStep()
    {
        if ($this->currentStep == 0 || $this->currentStep == 1) {
            if ($this->currentStep == 0) {
                $this->validate([
                    'form.firstName' => 'required|max:255|regex:/^[ ء-ي]+$/u',
                    'form.lastName' => 'required|max:255|regex:/^[ء-ي ]+$/u',
                    'form.mobileNumber' => 'required|numeric|digits_between:9,9',
                    'form.email' => 'required|max:255|email|unique:application_form,email',
                    'form.city' => 'required|exists:cities,id|numeric',

                ]);
            }
            if ($this->currentStep == 1) {
                $this->validate([
                    'form.officeName' => 'required|max:255|regex:/^[ء-ي ]+$/u',
                    'form.street' => 'required|max:300|regex:/^[ ء-ي]+$/u',
                    'form.district' => 'required|max:300|regex:/^[ء-ي ]+$/u',
                    'form.urlSlug' => 'max:255|regex:/^[a-zA-z0-9]+$/u|unique:application_form,urlSlug',
                    'form.officeCity' => 'required|exists:cities,id|numeric',
                ]);
            }
            $this->currentStep++;
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

    public function goToPreviousStep()
    {
        if ($this->currentStep == 1 || $this->currentStep == 2)
            $this->currentStep--;
        else
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'error',
                    'title' => 'عفوًا حدث خطأ :(',
                    'timer' => 2500,
                ]
            );
    }

    public function generateUniqueSlug()
    {
        do {
            $uniqueSlug = bin2hex(random_bytes(5));
        } while (registerForm::where("urlSlug", "=", $uniqueSlug)->first());
        return $uniqueSlug;
    }


    public function render()
    {
        return view('livewire.register')->extends('layouts.app');
    }
}
