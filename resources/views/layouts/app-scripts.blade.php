<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@auth
<script src="{{ URL::asset('assets/js/admin.min.js')}}"></script>
@else
<script src="{{ URL::asset('assets/js/main.min.js')}}"></script>
@endauth

@yield('script-bottom')