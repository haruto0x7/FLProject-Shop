@extends('admin._layouts.layout')
@section('title', trans('pages.admin.title.shop'))
@section('header', trans('pages.admin.header.shop'))
@section('description', trans('pages.admin.description.shop'))
@section('vender_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
@stop
@section('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
@stop
@section('content')
{{-- @include('admin.shop.component.description') --}}
@include('admin.shop.component.order')
@endsection
@section('page_vendor_js')
<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
@stop
@section('page_js')
<script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
@endsection
