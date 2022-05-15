@if(\Illuminate\Support\Facades\Request::route()->getName() != 'register' && \Illuminate\Support\Facades\Request::route()->getName() != 'login')
    <footer class="bg-info mt-auto p-3">
        <div class="container mt-3">
            <div class="row">
                <div class="col-xl-3 col-lg-3 d-xl-block d-lg-block d-none">
                    <img src="{{asset('assets/img/weblogo.png')}}" width="150px">
                    <h3 class="text-white user-select-none">الإلكترونية</h3>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-3 text-right">
                    <h3 class="text-white">بحث سريع</h3>
                    <div class="row mt-3">
                        <div class="col-4">
                            <h5>
                                <a href="#" class="text-light text-decoration-none">الكل</a>
                            </h5>
                        </div>
                        @foreach(\App\Models\categoriesModel::get()->toArray() as $category)
                            @if(\App\Models\propertiesModel::where('category',$category['id'])->count() > 0)
                                <div class="col-4">
                                    <h5>
                                        <a href="#"
                                           class="text-light text-decoration-none">{{$category['category']}}</a>
                                    </h5>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-3 text-right">
                    <h3 class="text-white">روابط سريعة</h3>
                    <ul class="text-white mt-3">
                        @guest
                            <li>
                                <h5>
                                    <a href="{{route('register')}}" class="text-light text-decoration-none">إنشاء مكتب
                                        إلكتروني</a>
                                </h5>
                            </li>
                            <li>
                                <h5>
                                    <a href="{{route('login')}}" class="text-light text-decoration-none">تسجيل دخول</a>
                                </h5>
                            </li>
                        @endguest
                        <li>
                            <h5>
                                <a href="{{url('/')}}" class="text-light text-decoration-none">الرئيسية</a>
                            </h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endif
