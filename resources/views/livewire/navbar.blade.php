<nav class="navbar navbar-expand-lg navbar-light bg-info mb-4">
    <a class="navbar-brand d-xl-none d-lg-none d-block" href="{{route('office-properties',$officeInfo['slug'])}}">
        <img src="{{asset('assets/img/weblogo.png')}}" width="100px">
    </a>
    <button class="m-2 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-xl-none d-lg-none d-block">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('office-properties',$officeInfo['slug'])}}">الكل</a>
                </li>
                @foreach(\App\Models\categoriesModel::get()->toArray() as $category)
                    @if(\App\Models\propertiesModel::where(['category' => $category['id']],['office_id' => $officeInfo['id']])->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">{{$category['category']}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <hr>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('properties')}}">لوحة التحكم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" wire:click="logout">تسجيل خروج</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link text-white">إنشاء مكتب
                            إلكتروني</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">تسجيل دخول</a>
                    </li>
                @endguest
            </ul>
        </div>

        <div class="row w-100 text-center d-xl-flex d-lg-flex d-none justify-content-center">
            <div class="col-4">
                <ul dir="rtl" class="mt-2 navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('office-properties',$officeInfo['slug'])}}">الكل</a>
                    </li>
                    @foreach(\App\Models\categoriesModel::get()->toArray() as $category)
                        @if(\App\Models\propertiesModel::where(['category' => $category['id']],['office_id' => $officeInfo['id']])->count() > 0)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">{{$category['category']}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-4 m-auto d-xl-block d-lg-block d-none">
                <a class="navbar-brand" href="{{route('office-properties',$officeInfo['slug'])}}">
                    <img src="{{asset('assets/img/weblogo.png')}}" width="100px">
                </a>
            </div>
            <div class="col-4">
                <ul dir="ltr" class="mt-2 navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a href="{{route('register')}}" class="nav-link text-white">إنشاء مكتب
                                إلكتروني</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('login')}}">تسجيل دخول</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" wire:click="logout">تسجيل خروج</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('properties')}}">لوحة التحكم</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
