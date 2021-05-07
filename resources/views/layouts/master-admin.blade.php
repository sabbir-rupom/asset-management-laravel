<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Laravel Practice</title>
    <meta content="Laravel Practice" name="description" />
    <meta content="Sabbir Rupom" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- START CSS Styles -->
    @include('layouts.head-css')
    <!-- END CSS Styles -->
</head>

@section('body')

<body>
    @show

    <!-- Start layout-wrapper -->
    <div id="layout_wrapper">

        <!-- START Section for Top Navigation Bar -->
        @include('layouts.topbar')
        <!-- END Section for Top Navigation Bar -->

        <!-- START Section for Left Sidebar -->
        @include('layouts.sidebar')
        <!-- END Section for Left Sidebar -->

        <!-- ============================================================== -->
        <!-- START Main Page Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                @include('layouts.default-message')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End Page-content -->
        </div>
        <!-- END Main Page Content -->
        @include('layouts.footer')
    </div>
    <!-- END layout-wrapper -->

    <!-- START Section for Right-Sidebar -->
    @include('layouts.sidebar-right')
    <!-- END Section Right-Sidebar  -->

    <!-- START JAVASCRIPT -->
    @include('layouts.app-scripts')
    <!-- END JAVASCRIPT -->

</body>

</html>