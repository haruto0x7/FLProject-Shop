@extends('admin._layouts.layout')
@section('title', trans('pages.admin.title.analytic'))
@section('header', trans('pages.admin.header.analytic'))
@section('description', trans('pages.admin.description.analytic'))
@section('vender_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
@stop
@section('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}">
@stop
@section('content')
@include('admin.analytic.component.analytic')
@endsection
@section('page_vendor_js')
<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
@stop
@section('page_js')
<script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
@endsection


