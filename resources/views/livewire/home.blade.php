<div>
    @section('links')
        <script src="https://kit.fontawesome.com/13195746f1.js" crossorigin="anonymous"></script>
    @endsection
    <div class="container mt-2 user-select-none">
        <div wire:ignore class="row selectorRow">
            <div class="col-12 mt-5 text-center d-flex">
                <div class="m-auto w-100 d-inline-block">
                    <h1>
                        العقارات الإلكترونية
                        <img src="{{asset('assets/img/weblogo.png')}}"
                             width="100px">
                    </h1>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="row d-flex justify-content-center">
                    <div id="allOffices" class="typeCard col-xl-4 col-lg-4 col-12 m-3 card rounded">
                        <div class="card-body text-center">
                            <img src="{{asset('assets/img/Working_re_ddwy.png')}}">
                            <h4>جميع المكاتب</h4>
                            <small class="text-muted">الاجمالي
                                : {{\App\Models\officesModel::where('status',4)->count()}}</small>
                        </div>
                    </div>
                    <div id="allProperties" class="typeCard col-xl-4 col-lg-4 col-12 m-3 card rounded">
                        <div class="card-body text-center">
                            <img src="{{asset('assets/img/Best_place_re_lne9.png')}}">
                            <h4>جميع العقارات</h4>
                            <small class="text-muted">الاجمالي : {{App\Models\propertiesModel::count()}}</small>
                        </div>
                    </div>
                    @guest
                        <a href="{{route('register')}}"
                           class="text-decoration-none text-dark typeCard col-xl-4 col-lg-4 col-12 m-3 card rounded">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/Terms_re_6ak4.png')}}">
                                <h4>إنشاء مكتب جديد</h4>
                            </div>
                        </a>
                    @endguest
                    @auth
                        <a href="{{route('properties')}}"
                           class="text-decoration-none text-dark typeCard col-xl-4 col-lg-4 col-12 m-3 card rounded">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/Dashboard_re_3b76.png')}}">
                                <h4>لوحة التحكم</h4>
                            </div>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <div wire:ignore.self class="row resultRow">
            <div class="col-12 text-right mb-3">
                <button id="selectorBack" class="btn rounded btn-outline-primary">
                    <i class="fas fa-arrow-right backIcon"></i>
                    <span>عودة</span>
                </button>
            </div>
            <div class="col-12 p-3 card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{$cardTitle}}</h4>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-12">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="col-form-label">المدينة :</label>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-12">
                                        <select class="form-control" id="cityFilter">
                                            <option selected="" disabled="">الرجاء الإختيار</option>
                                            <option value="0">الكل</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city['id']}}">{{$city['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if(count($allOffices) > 0)
                                    <div class="col-auto">
                                        <label class="col-form-label">الترتيب حسب :</label>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-12">
                                        <select class="form-control" id="officeFilter">
                                            <option selected="" disabled="">الرجاء الإختيار</option>
                                            <option value="desc">حسب الأحدث</option>
                                            <option value="asc">حسب الأقدم</option>
                                            <option value="officePropertiesDesc">العقارات الاكثر - الاقل</option>
                                            <option value="officePropertiesAsc">العقارات الاقل - الاكثر</option>
                                            <option value="officeViewsDesc">الزيارات الاكثر - الاقل</option>
                                            <option value="officeViewsAsc">الزيارات الاقل - الاكثر</option>
                                        </select>
                                    </div>
                                        @endif
                                    @if(count($allProperties) > 0)
                                    <div class="col-auto">
                                        <label class="col-form-label">الاقسام :</label>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-12">
                                        <select class="form-control" id="categoryFilter">
                                            <option selected="" disabled="">الرجاء الإختيار</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category['id']}}">{{$category['category']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row officeRow" wire:ignore.self>
                            @forelse($allOffices as $office)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mt-2 mb-2 rounded p-0">
                                    <a href="{{route('office-properties',$office['slug'])}}"
                                       class="card card-body shadow-sm infoCard text-dark text-decoration-none">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="text-dark">{{$office['name']}}</h3>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-6">
                                                    المدينة
                                                    : {{\App\Models\City::where('id',$office['city'])->first()->name}}
                                                </div>
                                                <div class="col-6">
                                                    الحي : {{$office['district']}}
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-6">
                                                    شارع : {{$office['street']}}
                                                </div>
                                                <div class="col-6">
                                                    الزيارات : {{$office['views']}}
                                                </div>
                                            </div>
                                            <hr class="m-1">
                                            <div class="col-6 text-center">
                                                <small class="text-muted">
                                                    <i class="fas fa-building"></i>
                                                    العقارات
                                                    : {{\App\Models\propertiesModel::where('office_id',$office['id'])->count()}}
                                                </small>
                                            </div>
                                            <div class="col-6 text-center">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{date('d-m-Y', strtotime($office['created_at']))}}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <h1 class="text-center">عذرًا لايوجد مكاتب</h1>
                            @endforelse
                        </div>
                        <div class="row propertiesRow" wire:ignore.self>
                            @forelse($allProperties as $property)
                                <div class="col-xl-4 col-lg-6 col-12 mt-2 mb-2">
                                    <a href="{{\App\Models\officesModel::where('id',$property['office_id'])->first()->slug}}/properties-details/{{$property['id']}}"
                                       class="card shadow-sm infoCard text-dark text-decoration-none">
                                        <img class="propertyImage"
                                             src="{{asset('storage/'.\App\Models\propertiesAttachmentsModel::where('property_id',$property['id'])->first()->image)}}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 text-left mb-3">
                                                            العنوان : {{$property['title']}}
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                            القسم
                                                            : {{\App\Models\categoriesModel::where('id',$property['category'])->first()->category}}
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">المدينة :
                                                            {{\App\Models\City::where('id',$property['city'])->first()->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <h1 class="text-center">عذرًا لايوجد عقارات</h1>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{asset('assets/js/custom.js')}}"></script>
    @endsection
</div>
