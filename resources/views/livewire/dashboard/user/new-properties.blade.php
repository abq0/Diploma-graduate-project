<div class="h-100 w-100">
    @section('links')
        <link rel="stylesheet" href="{{asset('assets/js/lib/Leaflet-map/leaflet.css')}}">
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet'/>
    @endsection

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
                        <h1 class="h3 mb-0 text-gray-800">انشاء عقار جديد</h1>
                    </div>

                    <div class="row">
                        <div class="col-12 card shadow-sm">
                            <div class="card-body rounded-0 p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <form wire:submit.prevent="create">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>العنوان</label>
                                                    <input maxlength="255" type="text" wire:model.defer="form.title"
                                                           class="form-control" placeholder="عنوان العقار">
                                                    @error('form.title')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المدينة</label>
                                                    <select class="form-control" wire:model.defer="form.city">
                                                        <option selected>الرجاء الأختيار</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('form.city')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>الحي</label>
                                                    <input maxlength="300" type="text" wire:model.defer="form.district"
                                                           class="form-control" placeholder="حي العقار">
                                                    @error('form.district')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>الشارع</label>
                                                    <input maxlength="300" type="text" wire:model.defer="form.street"
                                                           class="form-control" placeholder="شارع العقار">
                                                    @error('form.street')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المساحة</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">متر مربع</div>
                                                        </div>
                                                        <input maxlength="6" dir="rtl" wire:model.defer="form.area"
                                                               type="text"
                                                               class="form-control"
                                                               id="inlineFormInputGroup" placeholder="مساحة العقار">
                                                    </div>
                                                    @error('form.area')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>القسم</label>
                                                    <select class="form-control" id="propertyType"
                                                            wire:model.defer="form.category">
                                                        <option value="2" selected>الرجاء الأختيار</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category['id']}}">{{$category['category']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('form.category')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>طريقة الشراء</label>
                                                    <select class="form-control" wire:model.defer="form.paymentType">
                                                        <option selected>الرجاء الأختيار</option>
                                                        <option value="1">إيجار</option>
                                                        <option value="0">بيع</option>
                                                    </select>
                                                    @error('form.paymentType')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <small class="col-12 text-danger mb-4 mt-3">* هذه الخيارات متوفرة
                                                    للأقسام التالية فقط ( المنازل - الاستراحات )</small>
                                                <div class="form-group col-md-3">
                                                    <label>عدد غرف النوم</label>
                                                    <input wire:ignore type="number" wire:model.defer="form.roomsNum"
                                                           class="form-control additionalOptions"
                                                           placeholder="عدد غرف النوم للعقار">
                                                    @error('form.roomsNum')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>عدد المطابخ</label>
                                                    <input wire:ignore type="number" wire:model.defer="form.kitchensNum"
                                                           class="form-control additionalOptions"
                                                           placeholder="عدد المطابخ للعقار">
                                                    @error('form.kitchensNum')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>عدد الحمامات</label>
                                                    <input wire:ignore type="number" wire:model.defer="form.bathroomNum"
                                                           class="form-control additionalOptions"
                                                           placeholder="عدد الحمامات للعقار">
                                                    @error('form.bathroomNum')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>عدد الطوابق</label>
                                                    <input wire:ignore type="number" wire:model.defer="form.floorsNum"
                                                           class="form-control additionalOptions"
                                                           placeholder="عدد الطوابق للعقار">
                                                    @error('form.floorsNum')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>يوجد كراج ؟</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasGarage"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasGarage" id="hasGarage1"
                                                                   value="1">
                                                            <label class="form-check-label" for="hasGarage1">نعم</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasGarage"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasGarage" id="hasGarage2"
                                                                   value="0">
                                                            <label class="form-check-label" for="hasGarage2">لا</label>
                                                        </div>
                                                    </div>
                                                    @error('form.hasGarage')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>يوجد حديقة ؟</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasYard"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasYard" id="hasYard1" value="1">
                                                            <label class="form-check-label" for="hasYard1">نعم</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasYard"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasYard" id="hasYard2" value="0">
                                                            <label class="form-check-label" for="hasYard2">لا</label>
                                                        </div>
                                                    </div>
                                                    @error('form.hasYard')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>يوجد مصعد ؟</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasElevator"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasElevator" id="hasElevator1"
                                                                   value="1">
                                                            <label class="form-check-label"
                                                                   for="hasElevator1">نعم</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasElevator"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasElevator" id="hasElevator2"
                                                                   value="0">
                                                            <label class="form-check-label"
                                                                   for="hasElevator2">لا</label>
                                                        </div>
                                                    </div>
                                                    @error('form.hasElevator')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>يوجد مسبح ؟</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasPool"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasPool" id="hasPool1" value="1">
                                                            <label class="form-check-label" for="hasPool1">نعم</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input wire:ignore wire:model.defer="form.hasPool"
                                                                   class="form-check-input additionalOptions"
                                                                   type="radio" name="hasPool" id="hasPool2" value="0">
                                                            <label class="form-check-label" for="hasPool2">لا</label>
                                                        </div>
                                                    </div>
                                                    @error('form.hasPool')
                                                    <span
                                                        class="text-danger additionalOptionsError">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">الوصف</label>
                                                <textarea wire:model.defer="form.description" class="form-control"
                                                          rows="5" cols="10"
                                                          placeholder="وصف العقار"></textarea>
                                                @error('form.description')
                                                <span class="text-danger additionalOptionsError">* {{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>
                                                        اسم المالك
                                                    </label>
                                                    <input maxlength="300" wire:model.defer="form.ownerName" type="text"
                                                           class="form-control" placeholder="الاسم كاملُا">
                                                    @error('form.ownerName')
                                                    <span
                                                        class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>رقم الجوال</label>
                                                    <div class="input-group">
                                                        <input dir="ltr" wire:model.defer="form.mobileNumber"
                                                               maxlength="9" type="text"
                                                               class="rounded-0 form-control"
                                                               placeholder="5XXXXXXXX">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text rounded-0">+966</span>
                                                        </div>
                                                    </div>
                                                    @error('form.mobileNumber')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>يوجد واتس اب على الرقم ؟</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input wire:model.defer="form.hasWhatsapp"
                                                                   class="form-check-input" type="radio"
                                                                   name="inlineRadioOptions" id="inlineRadio1"
                                                                   value="1">
                                                            <label class="form-check-label"
                                                                   for="inlineRadio1">نعم</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input wire:model.defer="form.hasWhatsapp"
                                                                   class="form-check-input" type="radio"
                                                                   name="inlineRadioOptions" id="inlineRadio2"
                                                                   value="0">
                                                            <label class="form-check-label"
                                                                   for="inlineRadio2">لا</label>
                                                        </div>
                                                    </div>
                                                    @error('form.hasWhatsapp')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>موقع العقار على الخارطة</label>
                                                    <div wire:ignore id="map"></div>
                                                    @error('form.latitude')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-label">رفع صور العقار</label>
                                                    <input class="form-control" type="file" wire:model="images"
                                                           multiple="multiple">
                                                    @error('images')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                    @error('images.*')
                                                    <span class="text-danger">* {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block">
                                                انشاء
                                            </button>
                                        </form>
                                    </div>
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

    @section('scripts')
        <script src="{{asset('assets/js/lib/Leaflet-map/mapbox-options.js')}}"></script>
        <script src="{{asset('assets/js/lib/Leaflet-map/leaflet.js')}}"></script>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYXBxMCIsImEiOiJjbDFxZnZrd3kwbmFhM2VtdW5ubnMwc2d3In0.RsJW434tIdiVen3WGI6c0Q';
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [45.043546769686, 23.117762244165164],
                zoom: 8
            });
            map.addControl(
                new mapboxgl.GeolocateControl({
                    positionOptions: {
                        enableHighAccuracy: true
                    },
                    trackUserLocation: true,
                    showUserHeading: true
                })
            );
            mapboxgl.setRTLTextPlugin('https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.0/mapbox-gl-rtl-text.js');
            map.on('style.load', function () {
                map.on('click', function (e) {
                    var coordinates = e.lngLat;
                    Livewire.emit('setPropertyCoordinates', coordinates);
                    new mapboxgl.Popup().setLngLat(coordinates).addTo(map);
                    $('div.mapboxgl-marker').remove();
                    const oneMarker = new mapboxgl.Marker()
                        .setLngLat([coordinates['lng'], coordinates['lat']])
                        .addTo(map);
                });
            });
        </script>
    @endsection
</div>
