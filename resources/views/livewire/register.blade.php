@section('links')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/536ef2b3ca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/css/register-form/style.css')}}">
@endsection
<div wire:ignore.self>
    <div class="container w-100 title-note">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">طلب مكتب عقار إلكتروني</h1>
            </div>
        </div>
    </div>
    <div class="main mt-2">
        <div class="container stepsForm">
            <form id="signup-form" class="signup-form">
                <div class="content clearfix">
                    @if($currentStep == 0)
                        <fieldset class="d-block p-1">
                            <h2 class="mt-3">بياناتك الشخصية</h2>
                            <div class="row mt-4 form-group">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-xl-0 mt-lg-0 mt-md-0">
                                    <input type="text" class="form-control" wire:model.defer="form.firstName"
                                           maxlength="255"
                                           placeholder="الاسم الاول"/>
                                    @error('form.firstName')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-3">
                                    <input type="text" class="form-control" wire:model.defer="form.lastName"
                                           maxlength="255"
                                           placeholder="الاسم الاخير"/>
                                    @error('form.lastName')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <h6>رقم هاتفك الشخصي :</h6>
                                    <div class="input-group">
                                        <input maxlength="9" type="text" wire:model.defer="form.mobileNumber"
                                               class="rounded-0 form-control phoneNumberinput"
                                               placeholder="5XXXXXXXX">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0">+966</span>
                                        </div>
                                    </div>
                                    @error('form.mobileNumber')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="email" maxlength="255" wire:model.defer="form.email"
                                           class="form-control"
                                           placeholder="البريد الإلكتروني"/>
                                    @error('form.email')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="col-12">مكان الإقامة</label>
                                    <select wire:model.defer="form.city"
                                            class="form-control">
                                        <option selected>الرجاء اختيار مدينة</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('form.city')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                    @elseif($currentStep == 1)
                        <fieldset class="d-block p-1">
                            <h2 class="mt-3">بيانات المكتب
                                العقاري</h2>
                            <div class="row mt-4 form-group">
                                <div class="col-12 mt-xl-0 mt-lg-0 mt-md-0">
                                    <input type="text" class="form-control" wire:model.defer="form.officeName"
                                           maxlength="255"
                                           placeholder="اسم المكتب"/>
                                    @error('form.officeName')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-2">
                                    <select wire:model.defer="form.officeCity"
                                            class="custom-select custom-select-sm w-100 form-control">
                                        <option selected>الرجاء اختيار مدينة</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.officeCity')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-2">
                                    <input type="text" class="form-control" wire:model.defer="form.district"
                                           maxlength="300"
                                           placeholder="اسم الحي"/>
                                    @error('form.district')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="text" class="form-control" wire:model.defer="form.street"
                                           maxlength="300"
                                           placeholder="اسم الشارع"/>
                                    @error('form.street')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-2">
                                    <label>
                                        الرابط المخصص للمكتب
                                        <span class="text-muted">( اختياري )</span>
                                    </label>
                                    <input wire:model.defer="form.urlSlug" class="form-control"
                                           maxlength="255" placeholder="مثلا : abdulrahman">
                                    <span class="text-danger">ملاحظة : اذا لم يتم كتابة شي سيتم انشاء الرابط المخصص بشكل تلقائي</span>
                                    <br>
                                    @error('form.urlSlug')
                                    <span class="text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                    @elseif($currentStep == 2)
                        <fieldset class="d-block p-1">
                            <h2 class="mt-3">مُلخص البيانات</h2>
                            <div class="row mt-4 form-group">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-xl-0 mt-lg-0 mt-md-0">
                                    <label>اسمك كاملًا</label>
                                    <input type="text" class="form-control" disabled readonly
                                           value="{{"$form[firstName] $form[lastName]"}}"/>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-xl-0 mt-lg-0 mt-md-0">
                                    <label>اسم المكتب</label>
                                    <input type="text" class="form-control" disabled readonly
                                           value="{{$form['officeName']}}"/>
                                </div>
                                <div class="col-6 mt-2">
                                    <label>اسم الحي</label>
                                    <input type="text" class="form-control" disabled readonly
                                           value="{{$form['district']}}"/>
                                </div>
                                <div class="col-6 mt-2">
                                    <label>البريد الإلكتروني</label>
                                    <input type="text" class="form-control" disabled readonly
                                           value="{{$form['email']}}"/>
                                </div>
                                <div class="col-12 mt-3">
                                    <h6>رقم هاتفك الشخصي :</h6>
                                    <input disabled dir="ltr" readonly type="text"
                                           class="rounded-0 form-control text-left"
                                           placeholder="+966 {{$form['mobileNumber']}}">
                                </div>
                            </div>
                        </fieldset>
                    @endif
                </div>
            </form>
            <div class="row mt-4">
                @if($currentStep != 0)
                    <button class="btn btn-outline-light col-4 m-2" wire:click="goToPreviousStep">السابق</button>
                @endif
                @if($currentStep != 2)
                    <button class="btn btn-outline-light col-4 m-2" wire:click="goToNextStep">التالي</button>
                @endif
                @if($currentStep == 2)
                    <button class="btn btn-outline-light col-4 m-2" wire:click="create">إرسال</button>
                @endif
            </div>
            <div class="row mt-2 text-center">
                <p class="text-white">
                    لديك حساب بالفعل ؟
                    <a href="{{route('login')}}" class="text-white">قم بتسجيل الدخول</a>
                </p>
            </div>
        </div>
        <div class="container requestSuccesses">
            <div class="card">
                <div class="card-body p-5 text-center">
                    <h1>
                        <i class="fa-solid fa-circle-check text-success"></i>
                    </h1>
                    <h2>شكرُا لك</h2>
                    <h6>تم إرسال طلبك لأرسال طلب اخر كم بالضغط هنا</h6>
                    <button onClick="window.location.reload();" class="btn btn-lg btn-outline-success">طلب جديد</button>
                </div>
            </div>
        </div>

    </div>
</div>
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
    <script
        src="{{asset('assets/js/register-form/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script
        src="{{asset('assets/js/register-form/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('assets/js/register-form/events.js')}}"></script>
@endsection
