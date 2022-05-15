<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">لوحة تحكم الإدارة</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 1)
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboardIndex')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>المُلخص</span></a>
        </li>
    @endif

<!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- admin -->
    <div class="sidebar-heading">
        العقارات
        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 1)
            & المكاتب
        @endif
    </div>

    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesRequests"
               aria-expanded="true" aria-controls="collapsesRequests">
                <i class="fas fa-city"></i>
                <span>المكاتب</span>
            </a>
            <div id="collapsesRequests" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">خيارات</h6>
                    <a class="collapse-item" href="{{route('createRequests')}}">
                        طلبات الإنشاء
                        @if(\App\Models\registerForm::where('status',1)->count() != 0)
                            <span class="badge badge-danger badge-counter ml-3">
                            {{\App\Models\registerForm::where('status',1)->count()}}+
                    </span>
                        @endif
                    </a>
                    <a class="collapse-item" href="{{route('offices')}}">
                        جميع المكاتب
                        @if(\App\Models\officesModel::count() != 0)
                            <span class="badge badge-info badge-counter ml-3">
                            {{\App\Models\officesModel::count()}}+
                    </span>
                        @endif
                    </a>
                </div>
            </div>
        </li>
    @endif


    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 0)
        <li class="nav-item">
            <a class="nav-link" href="{{route('properties')}}">
                <i class="fas fa-building fa-2x"></i>
                <span>
                    جميع العقارات
                    @if(\App\Models\propertiesModel::where('office_id',\Illuminate\Support\Facades\Auth::user()->office_id)->count() > 0)
                        <span
                            class="p-1 rounded badge-info">{{\App\Models\propertiesModel::where('office_id',\Illuminate\Support\Facades\Auth::user()->office_id)->count()}}</span>
                    @endif
                </span>

            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('new-properties')}}">
                <i class="fas fa-fw fa-pen-alt"></i>
                <span>إضافة عقار</span></a>
        </li>
@endif

<!-- user -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
