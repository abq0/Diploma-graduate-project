<div>
    @section('links')
        <script src="https://kit.fontawesome.com/13195746f1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('assets/js/lib/Leaflet-map/leaflet.css')}}">
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet'/>
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    @endsection
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="row">
                    <h4>{{$property[0]['title']}} -
                        @if($property[0]['paymentType'] == 1)
                            إيجار
                        @else
                            بيع
                        @endif
                    </h4>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($propertyImages as $image)
                            <div class="swiper-slide">
                                <img src="{{asset('storage/'.$image['image'])}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <hr class="mt-3 mb-3">
            <div class="row">
                <div class="col-12 text-right text-break">
                    <p class="text-muted">الوصف :</p>
                    <p>
                        {{$property[0]['description']}}
                    </p>
                </div>
                <div class="col-12 mt-4">
                    <table class="table table-striped text-center">
                        <tbody>
                        <tr>
                            <td>المدينة</td>
                            <td class="text-center">
                                <i class="fa-solid fa-city"></i>
                                {{\App\Models\City::where('id',$property[0]['city'])->first()->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>الحي</td>
                            <td class="text-center">
                                <i class="fa-solid fa-street-view"></i>
                                {{$property[0]['district']}}
                            </td>
                        </tr>
                        <tr>
                            <td>الشارع</td>
                            <td class="text-center">
                                <i class="fa-solid fa-road"></i>
                                {{$property[0]['street']}}
                            </td>
                        </tr>
                        <tr>
                            <td>المساحة</td>
                            <td class="text-center">
                                {{$property[0]['area']}}
                                م<sup>2</sup>
                            </td>
                        </tr>
                        @if($property[0]['category'] != 12 && $property[0]['category'] != 16)
                            <tr>
                                <td>المطابخ</td>
                                <td class="text-center">
                                    <i class="fa-solid fa-kitchen-set"></i>
                                    {{$property[0]['kitchensNum']}}
                                </td>
                            </tr>
                            <tr>
                                <td>دورات المياه</td>
                                <td class="text-center">
                                    <i class="fa-solid fa-shower"></i>
                                    {{$property[0]['bathroomNum']}}
                                </td>
                            </tr>
                            <tr>
                                <td>غرف النوم</td>
                                <td class="text-center">
                                    <i class="fa-solid fa-bed"></i>
                                    {{$property[0]['roomsNum']}}
                                </td>
                            </tr>
                            <tr>
                                <td>مسبح</td>
                                <td class="text-center">
                                    @if($property[0]['hasPool'] == 1)
                                        <i class="fa-solid fa-check text-success" data-toggle="tooltip"
                                           data-placement="top"
                                           title="متوفر"></i>
                                    @else
                                        <i class="fa-solid fa-x text-danger" data-toggle="tooltip" data-placement="top"
                                           title="غير متوفر"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>كراج</td>
                                <td class="text-center">
                                    @if($property[0]['hasGarage'] == 1)
                                        <i class="fa-solid fa-check text-success" data-toggle="tooltip"
                                           data-placement="top"
                                           title="متوفر"></i>
                                    @else
                                        <i class="fa-solid fa-x text-danger" data-toggle="tooltip" data-placement="top"
                                           title="غير متوفر"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>حديقة</td>
                                <td class="text-center">
                                    @if($property[0]['hasYard'] == 1)
                                        <i class="fa-solid fa-check text-success" data-toggle="tooltip"
                                           data-placement="top"
                                           title="متوفر"></i>
                                    @else
                                        <i class="fa-solid fa-x text-danger" data-toggle="tooltip" data-placement="top"
                                           title="غير متوفر"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>مصعد</td>
                                <td class="text-center">
                                    @if($property[0]['hasElevator'] == 1)
                                        <i class="fa-solid fa-check text-success" data-toggle="tooltip"
                                           data-placement="top"
                                           title="متوفر"></i>
                                    @else
                                        <i class="fa-solid fa-x text-danger" data-toggle="tooltip" data-placement="top"
                                           title="غير متوفر"></i>
                                    @endif
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <small class="text-muted float-start">
                        <i class="fas fa-calendar-alt"></i>
                        تاريخ الاضافة : {{date('d-m-Y', strtotime($property[0]['created_at']))}}
                        |
                        {{\Illuminate\Support\Carbon::createFromTimeStamp(strtotime($property[0]['created_at']))->diffForHumans()}}
                    </small>
                </div>
            </div>
            <div class="col-12">
                <p>موقع العقار على الخارطة</p>
                <div id="map"></div>
            </div>
            <hr class="mt-3 mb-3">
            <div class="col-12">
                المالك :
                <h5>
                    <small>
                        <i class="fa-solid fa-person-shelter text-success"></i>
                    </small>
                    {{$property[0]['ownerName']}}
                </h5>
                <p>التواصل :
                    <span dir="ltr">
                    +966 {{$property[0]['mobileNumber']}}
                </span>
                </p>
                @if($property[0]['hasWhatsapp'] == 1)
                    <a class="btn btn-success text-white" href="https://wa.me/966{{$property[0]['mobileNumber']}}">واتس
                        اب</a>
                    <a class="btn btn-info text-white" href="tel:{{$property[0]['mobileNumber']}}">اتصال</a>
                @else
                    <a class="btn btn-info text-white" href="tel:{{$property[0]['mobileNumber']}}">اتصال</a>
                @endif
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{asset('assets/js/lib/Leaflet-map/mapbox-options.js')}}"></script>
        <script src="{{asset('assets/js/lib/Leaflet-map/leaflet.js')}}"></script>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYXBxMCIsImEiOiJjbDFxZnZrd3kwbmFhM2VtdW5ubnMwc2d3In0.RsJW434tIdiVen3WGI6c0Q';
            mapboxgl.setRTLTextPlugin('https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.0/mapbox-gl-rtl-text.js');
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [{{$property[0]['longitude']}}, {{$property[0]['latitude']}}],
                zoom: 10
            });
            const oneMarker = new mapboxgl.Marker()
                .setLngLat([{{$property[0]['longitude']}}, {{$property[0]['latitude']}}])
                .addTo(map);
        </script>
    @endsection
</div>
