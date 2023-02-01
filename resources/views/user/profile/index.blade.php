@extends('user._layouts.layout')
@section('title', trans('pages.title.profile'))
@section('header', trans('pages.header.profile'))
@section('description', trans('pages.description.profile'))
@section('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
@stop
@section('content')
@include('user.profile.component.setting')
@endsection
@section('page_vendor_js')
<script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@stop
@section('page_js')
<script src="{{asset('app-assets/js/scripts/pages/page-auth-reset-password.js')}}"></script>
@stop
