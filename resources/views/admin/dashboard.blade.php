@extends('layouts.master-admin')

@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <h1>Admin Dashboard</h1>

    <button type="button" id="sa-success" class="btn btn-lg btn-success">Sweet Alert</button>

    <form method="POST" action="{{ route('admin.dashboard') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 mt-5">
            <label class="form-label" for="customFile">Default file input example</label>
            <input type="file" class="form-control" name="file" />

            @error('file')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" value="Upload">
        </div>

    </form>
    <img class="img img-fluid" src="{{ $image }}" alt="Image file" />
@endsection

@section('script')
<!--sweetalert2 js-->
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
@endsection