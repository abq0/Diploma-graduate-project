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
                <livewire:nav />
            <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">الملخص</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                إجمالي المكاتب
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{count($offices)}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-house-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                إجمالي العقارات
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{$propertiesCount}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                الطلبات المعلقة
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$requests}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">اكثر 10 مكاتب زيارتًا</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if(count($offices) > 0)
                                            <table class="table table-bordered" id="dataTableOffices" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>الاسم</th>
                                                    <th>إجمالي الزيارات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($offices as $office)
                                                    <tr>
                                                        <td>{{$office['name']}}</td>
                                                        <td>{{$office['views']}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h1 class="text-center">عذرًا لا يوجد مكاتب حاليًا</h1>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">اكثر 10 اقسام زيارتًا</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if(count($categories) > 0)
                                            <table class="table table-bordered" id="dataTableOffices" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>الاسم</th>
                                                    <th>إجمالي الزيارات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category['category']}}</td>
                                                        <td>{{$category['views']}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h1 class="text-center">عذرًا لا يوجد اقسام حاليًا</h1>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
</div>
