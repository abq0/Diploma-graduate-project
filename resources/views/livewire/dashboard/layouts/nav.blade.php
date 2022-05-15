<div>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 1)
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    @if(\App\Models\registerForm::where('status',1)->count() != 0)
                        <span class="badge badge-danger badge-counter">
                        {{\App\Models\registerForm::where('status',1)->count()}}+
                </span>
                    @endif
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        الأشعارات
                    </h6>
                    @if(\App\Models\registerForm::where('status',1)->count() != 0)
                        <a class="dropdown-item d-flex align-items-center p-3" href="{{route('createRequests')}}">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">لديك طلبات جديدة</div>
                                <span class="font-weight-bold">
                            هناك :
                       {{\App\Models\registerForm::where('status',1)->count()}}
                            طلب/ـات
                        </span>
                            </div>
                        </a>
                    @else
                        <a class="dropdown-item d-flex align-items-center p-3" href="{{route('createRequests')}}">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                            <span class="font-weight-bold">
                          لا يوجد طلبات حاليًا
                        </span>
                            </div>
                        </a>
                    @endif
                </div>
            </li>

            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>
            @endif

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small d-block">{{\Illuminate\Support\Facades\Auth::user()->firstName}}</span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="userDropdown">
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 0)
                    <a class="dropdown-item" href="{{route('office-properties',\App\Models\officesModel::where('id',\Illuminate\Support\Facades\Auth::user()->office_id)->first()->slug)}}">
                        <i class="fas fa-route fa-sm fa-fw mr-2 text-gray-400"></i>
                        العودة للموقع
                    </a>
                    @endif
                    <a class="dropdown-item" href="#" wire:click="logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        تسجيل خروج
                    </a>
                </div>
            </li>

        </ul>

    </nav>

</div>
