<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Laravel Practice</title>
    <meta content="Laravel Practice" name="description" />
    <meta content="Sabbir Rupom" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- START CSS Styles -->
    @include('layouts.head-css')
    <!-- END CSS Styles -->
</head>

@section('body')

<body data-layout="horizontal">
    @show

    <!-- Begin page -->
    <div id="layout_wrapper">
        @include('layouts.horizontal-navbar')
        <!-- ============================================================== -->
        <!-- START Main Page Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('notification')
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End Page-content -->
        </div>
        <!-- END Main Page Content -->
        @include('layouts.footer')
    </div>
    <!-- END wrapper -->

    <!-- END Right Sidebar -->

    @include('layouts.app-scripts')
</body>

</html>