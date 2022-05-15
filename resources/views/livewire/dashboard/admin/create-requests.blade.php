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
                        <h1 class="h3 mb-0 text-gray-800">طلبات الإنشاء</h1>
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
                                <div class="row">
                                    @forelse($requests as $request)
                                        <div class="col-xl-3 col-lg-6 col-12">
                                            <div class="card border-left-info shadow-sm">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="info-wrapper">
                                                            <div class="col-12 mb-3">
                                                                <button
                                                                    class="btn btn-info infoSwitcher personalInformation">
                                                                    إظهار
                                                                    بيانات المكتب
                                                                </button>
                                                            </div>
                                                            <div class="col-12 personalInformation">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5 class="text-muted">البيانات الشخصية</h5>
                                                                    </div>
                                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                                        <small class="text-muted">الاسم كاملًا</small>
                                                                        <p>{{"$request[firstName] $request[lastName]"}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-4 col-12 text-left">
                                                                        <small class="text-muted">المنطقة</small>
                                                                        <p>{{\App\Models\City::where('id',$request['city'])->first()->name}}</p>
                                                                    </div>
                                                                    <div class="col-12 text-left">
                                                                        <small class="text-muted">رقم الهاتف</small>
                                                                        <p dir="ltr">{{"+966 $request[mobileNumber]"}}</p>
                                                                    </div>
                                                                    <div class="col-12 text-left">
                                                                        <small class="text-muted">البريد
                                                                            الإلكتروني</small>
                                                                        <p dir="ltr">{{$request["email"]}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 officeInformation">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5 class="text-muted">بيانات المكتب</h5>
                                                                    </div>
                                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-12">
                                                                        <small class="text-muted">الاسم</small>
                                                                        <p>{{$request["officeName"]}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-3 col-lg-3 col-md-3 col-12 text-left">
                                                                        <small class="text-muted">المنطقة</small>
                                                                        <p>{{\App\Models\City::where('id',$request['officeCity'])->first()->name}}</p>
                                                                    </div>
                                                                    <div class="col-6 text-left">
                                                                        <small class="text-muted">الشارع</small>
                                                                        <p>{{$request["street"]}}</p>
                                                                    </div>
                                                                    <div class="col-6 text-left">
                                                                        <small class="text-muted">الحي</small>
                                                                        <p>{{$request["district"]}}</p>
                                                                    </div>
                                                                    <div class="col-6 text-left">
                                                                        <small class="text-muted">بيانات اضافية</small>
                                                                        <p>لا يوجد</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="w-100">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-xl-6 col-12 text-center">
                                                                    <button class="btn btn-success"
                                                                            wire:click="updateRequest({{$request['id']}},2)">
                                                                        قبول
                                                                    </button>
                                                                    <button class="btn btn-danger"
                                                                            wire:click="refuseAlert({{$request['id']}})">
                                                                        رفض
                                                                    </button>
                                                                </div>
                                                                <div class="col-xl-6 col-12 text-center mt-xl-0 mt-3">
                                                                    <small class="text-muted">
                                                                        <i class="fas fa-calendar-alt"></i>
                                                                        منذ :
                                                                        {{\Illuminate\Support\Carbon::createFromTimeStamp(strtotime($request['created_at']))->diffForHumans()}}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <h2 class="text-dark">عذرًا لا يوجد طلبات حاليًا</h2>
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
