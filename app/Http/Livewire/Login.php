<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class Login extends Component
{


    public $account = [
        'email' => '',
        'password' => ''
    ];

    protected $messages = [
        'account.email.required' => 'البريد الإلكتروني مطلوب',
        'account.email.email' => 'صيغة البريد الإلكتروني خطأ',
        'account.password.required' => 'كلمة كلمة المرور مطلوبه',
    ];

    public function login()
    {
        $this->validate([
            'account.email' => 'required|email',
            'account.password' => 'required'
        ]);
        if (Auth::attempt(['email' => $this->account['email'], 'password' => $this->account['password']]))
            if(Auth::user()->isAdmin == 1)
                return redirect(route('dashboardIndex'));
            else
                return redirect(route('properties'));
        else
            session()->flash('message', 'البريد الإلكتروني او كلمة المرور غير صحيحة');
    }

    public
    function render()
    {
        return view('livewire.login')->extends('layouts.app');
    }
}
