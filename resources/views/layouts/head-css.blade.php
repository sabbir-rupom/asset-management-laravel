@yield('css')

<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

@auth
<link href="{{ URL::asset('/assets/css/admin.min.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ URL::asset('/assets/css/main.min.css') }}" rel="stylesheet" type="text/css" />
@endauth