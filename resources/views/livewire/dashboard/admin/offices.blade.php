<div class="h-100 w-100">

    <div id="wrapper">

        <!-- Sidebar -->
    @include('livewire.dashboard.layouts.sidebar')
    <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <livewire:nav/>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">جميع المكاتب</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 card shadow-sm">
                            <div wire:loading class="loading-div">
                                <p class="text-info loading-note">
                                    <span class="spinner-border spinner-border-sm mt-5" role="status"
                                          aria-hidden="true"></span>
                                    الرجاء الأنتظار...
                                </p>
                            </div>
                            <div class="card-body rounded-0 p-3">
                                @if(count($offices) > 0)
                                    <div class="row mb-3">
                                        <div class="sortNote">
                                   <span>
                                    <svg class="mr-1" style="width: 18px" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 14 14">
                                    <path d="M5.61 0v14.017L1 9.407m8 4.61V0l4.61 4.61" fill="none"
                                          stroke="#42526E"
                                          stroke-linecap="round" stroke-linejoin="bevel"
                                          stroke-width=".75"></path>
                                </svg>
                               </span>
                                            <span>ترتيب حسب</span>
                                        </div>
                                        <span class="sortSelector">
                                    <select class="form-control bg-white border-0" id="officeFilter">
                                        <option selected disabled>الرجاء الإختيار</option>
                                        <option value="desc">حسب الأحدث</option>
                                        <option value="asc">حسب الأقدم</option>
                                        <option value="on">الحالة : مفعل - معطل</option>
                                        <option value="off">الحالة : معطل - مفعل</option>
                                    </select>
                                </span>
                                    </div>
                                @endif
                                <div class="row">
                                    @forelse($offices as $office)
                                        <div class="col-xl-3 col-lg-6 col-12 mt-2 mb-2">
                                            <div
                                                class="card @if($office['status'] == 4) border-left-success @else border-left-warning @endif shadow-sm">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <h5 class="text-muted">{{$office['name']}}</h5>
                                                                </div>
                                                                <div
                                                                    class="col-xl-6 col-lg-6 col-md-6 col-12 text-left">
                                                                    <small class="text-muted">المنطقة</small>
                                                                    <p>{{\App\Models\City::where('id',$office['city'])->value('name')}}</p>
                                                                </div>
                                                                <div class="col-6 text-left">
                                                                    <small class="text-muted">الشارع</small>
                                                                    <p>{{$office['street']}}</p>
                                                                </div>
                                                                <div class="col-6 text-left">
                                                                    <small class="text-muted">الحي</small>
                                                                    <p>{{$office['district']}}</p>
                                                                </div>
                                                                <div
                                                                    class="col-xl-6 col-lg-6 col-md-6 col-12 text-left">
                                                                    <small class="text-muted">رقم الهاتف الشخصي</small>
                                                                    <p dir="ltr">
                                                                        +966
                                                                        {{\App\Models\User::where('office_id',$office['id'])->value('mobileNumber')}}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-xl-6 col-lg-6 col-md-6 col-12 text-left">
                                                                    <small class="text-muted">إجمالي العقارات</small>
                                                                    <p>1</p>
                                                                </div>
                                                                <div
                                                                    class="col-xl-6 col-lg-6 col-md-6 col-12 text-left">
                                                                    <small class="text-muted">كلمة المرور</small>
                                                                    <i class="fas fa-eye passwordReveal"></i>
                                                                    <input type="password" disabled readonly
                                                                           class="w-100 bg-white border-0 passwordValue"
                                                                           value="{{$office['password']}}">
                                                                </div>
                                                                <div class="col-12 text-left mb-3">
                                                                    الرابط المخصص للمكتب :
                                                                    <a class="text-info"
                                                                       href="{{url('/').'/'.$office['slug']}}">الذهاب
                                                                        للمكتب</a>
                                                                </div>
                                                                <small class="col-12 text-left">
                                                                    تاريخ القبول :
                                                                    {{date('d/m/Y', strtotime($office['created_at']))}}
                                                                </small>
                                                            </div>
                                                            <hr class="w-100">
                                                            <div class="col-12">
                                                                <button class="btn btn-danger"
                                                                        wire:click="deleteAlert({{$office['id']}})">حذف
                                                                    المكتب
                                                                </button>
                                                                @if($office['status'] == 4)
                                                                    <button class="btn btn-warning"
                                                                            wire:click="updateRequest({{$office['id']}},5)">
                                                                        تعطيل
                                                                    </button>
                                                                @else
                                                                    <button class="btn btn-success"
                                                                            wire:click="updateRequest({{$office['id']}},4)">
                                                                        تفعيل
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <h2 class="text-dark">عذرًا لا يوجد مكاتب حاليًا</h2>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
</div>
