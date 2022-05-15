@section('links')
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/register-form/style.css')}}">
@endsection
<div wire:ignore.self>
    <div class="container w-100 title-note">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">تسجيل الدخول</h1>
            </div>
        </div>
    </div>
    <div class="main mt-2">
        <div class="container stepsForm">
            <form wire:submit.prevent="login">
                <div class="content clearfix">
                    <fieldset class="p-4">
                        <div class="row mt-3 d-inline form-group">
                            <div class="col-12 text-right">
                                @if (session()->has('message'))
                                    <div class="col-11 text-right text-danger">
                                        * {{ session('message') }}
                                    </div>
                                @endif
                                <label>البريد الإلكتروني : </label>
                                <input type="email" class="form-control" wire:model.defer="account.email">
                                @error('account.email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-3 text-right">
                                <label>كلمة المرور :</label>
                                <input type="password" class="form-control" wire:model.defer="account.password">
                                @error('account.password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-3 text-center text-right">
                                <button class="btn btn-block btn-success">تسجيل دخول</button>
                                <p class="mt-4">
                                    ليس لديك حساب ؟ قم
                                    <a href="{{route('register')}}">بأنشاء حساب جديد</a>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>
