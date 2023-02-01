@extends('user._layouts.layout')
@section('title', trans('pages.title.home'))
@section('header', trans('pages.header.home'))
@section('description', trans('pages.description.home'))
@section('vender_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
@stop
@section('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-ecommerce-details.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-number-input.css')}}">
@stop
@section('content')
@include('user.home.component.dashboard')
@include('user.home.component.info')
@include('user.home.component.order')
@endsection
@section('page_vendor_js')
<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
@stop
@section('page_js')
<script src="{{asset('app-assets/js/scripts/forms/form-select2.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/pages/app-ecommerce-details.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-number-input.min.js')}}"></script>
@stop