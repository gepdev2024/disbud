@extends('layouts/commonMaster' )

@section('layoutContent')
@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

<!-- Content -->
@yield('content')
<!--/ Content -->

@endsection