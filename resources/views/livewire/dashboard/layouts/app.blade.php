<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} | لوحة التحكم</title>
    <link rel="stylesheet" href="{{asset('assets/js/dashboard/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/sb-admin-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard/sb-admin-custom.css')}}">
    @yield('links')
    @livewireStyles
</head>

<body class="overflow-hidden">
<div class="loading-Screen w-100 h-100 bg-white position-fixed text-center">
    <div>
        <span class="spinner-border spinner-border-sm mb-xl-0 mb-lg-0 mb-md-0 mb-2" role="status"
              aria-hidden="true"></span>
        <h4 style="display: contents">الرجاء الأنتظار قليلًا ...</h4>
    </div>
</div>
<div id="wrapper">
    @yield('content')
</div>

@livewireScripts
</body>

<script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
<script src="{{asset('assets/js/lib/popper.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/app.js')}}"></script>
<script src="{{asset('assets/js/dashboard/sb-admin-2.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/js/dashboard/chart-pie-demo.js')}}"></script>
<script src="{{asset('assets/js/dashboard/events.js')}}"></script>
@yield('scripts')
</html>
