<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="horizontal-menu-template">

<head>
    @include('layouts.header')
</head>

<body>
    <div class="loading">
        <div class="spinner">
            <img src="{{ url('/') }}/favicon.png" width="60" alt="">
        </div>
    </div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu block-overlay">
        <div class="layout-container">

            @include('layouts.navbar')

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    @include('sweetalert::alert')

                    {{-- @include('layouts.menu') --}}

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ship /</span> Select Ship</h4>

                        <!-- Popular Articles -->
                        <div class="help-center-popular-articles bg-help-center py-5">
                            <div class="container-xl">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto mb-4">
                                        <div class="row">
                                            @foreach ($ships as $ship)
                                                <div class="col-md-4 mb-md-4 mb-4">
                                                    <div class="card h-100">
                                                        <img class="card-img-top" src="{{ asset('storage/' . $ship->photo) }}" alt="Card image cap" height="200" />
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $ship->name }} ({{ $ship->categori }})</h5>
                                                            <p class="card-text">

                                                            </p>
                                                            <a href="/ship/{{ $ship->uuid }}/selected" class="btn btn-outline-primary">Select</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Popular Articles -->

                    </div>
                    <!--/ Content -->

                    @include('layouts.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>
            <!--/ Layout container -->
        </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->
    @include('layouts.script')

</body>

</html>
