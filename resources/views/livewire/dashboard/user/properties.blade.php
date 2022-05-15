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
                        <h1 class="h3 mb-0 text-gray-800">جميع العقارات</h1>
                    </div>

                    <div class="row">
                        <div class="col-12 card shadow-sm">
                            <div wire:loading="" class="loading-div">
                                <p class="text-info loading-note">
                                        <span class="spinner-border spinner-border-sm mt-5" role="status"
                                              aria-hidden="true"></span>
                                    الرجاء الأنتظار...
                                </p>
                            </div>
                            <div class="card-body rounded-0 p-3">
                                @if(count($properties) > 0)
                                    <div class="row mb-3">
                                        <div class="sortNote">
                                   <span>
                                    <svg class="mr-1" style="width: 18px" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 14 14">
                                    <path d="M5.61 0v14.017L1 9.407m8 4.61V0l4.61 4.61" fill="none" stroke="#42526E"
                                          stroke-linecap="round" stroke-linejoin="bevel" stroke-width=".75"></path>
                                </svg>
                               </span>
                                            <span>ترتيب حسب</span>
                                        </div>
                                        <span class="sortSelector">
                                    <select class="form-control bg-white border-0" id="propertiesFilter">
                                        <option selected="" disabled="">الرجاء الإختيار</option>
                                        <option value="desc">حسب الأحدث</option>
                                        <option value="asc">حسب الأقدم</option>
                                    </select>
                                </span>
                                    </div>
                                @endif
                                <div class="row">
                                    @forelse($properties as $property)
                                        <div class="col-xl-4 col-lg-6 col-12 mt-2 mb-2">
                                            <div class="card shadow-sm">
                                                <img class="propertyImage"
                                                     src="{{asset('storage/'.\App\Models\propertiesAttachmentsModel::where('property_id',$property['id'])->first()->image)}}">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div
                                                                    class="col-12 text-left mb-3">
                                                                    العنوان : {{$property['title']}}
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                                    القسم :
                                                                    {{\App\Models\categoriesModel::where('id',$property['category'])->first()->category}}
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">المنطقة :
                                                                    {{\App\Models\City::where('id',$property['city'])->first()->name}}
                                                                </div>
                                                            </div>
                                                            <hr class="w-100">
                                                            <div class="col-12">
                                                                <a href="{{$office[0]['slug']}}/properties-details/{{$property['id']}}" class="btn btn-info btn-block">المزيد من
                                                                    التفاصيل</a>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-6">
                                                                    <a href="{{route('edit-properties',$property['id'])}}"
                                                                       class="btn btn-primary btn-block">تعديل</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <button
                                                                        wire:click="deleteAlert({{$property['id']}})"
                                                                        class="btn btn-danger btn-block">حذف
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <h2 class="text-dark">عذرًا لا يوجد عقارات</h2>
                                        </div>
                                    @endif
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
