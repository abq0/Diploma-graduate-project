<!DOCTYPE html>
<html lang="ar" dir="rtl" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal:wght@300&display=swap" rel="stylesheet">
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

@if(\Illuminate\Support\Facades\Request::route()->getName() != 'register' && \Illuminate\Support\Facades\Request::route()->getName() != 'login' && \Illuminate\Support\Facades\Request::route()->getName() != 'home')
    <livewire:navbar/>
@endif

@yield('content')
<div class="mt-5"></div>
@if(\Illuminate\Support\Facades\Request::route()->getName() != 'register' && \Illuminate\Support\Facades\Request::route()->getName() != 'login' && \Illuminate\Support\Facades\Request::route()->getName() != 'home')
<livewire:footer/>
@endif
@livewireScripts
</body>

<script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
@yield('scripts')
</html>
