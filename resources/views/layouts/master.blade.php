@include('components.head')
@include('components.top_header')
@include('components.remove_notification_modal')
@include('components.side-menu')


<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @yield('main-content')
                </div>
            </div>
            <!-- end page title -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@include('components.footer')
@include('components.theme_settings')
@include('components.floating_settings')
@include('components.bottom_scripts')
