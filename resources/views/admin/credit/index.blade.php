@extends('admin._layouts.layout')
@section('title', trans('pages.admin.title.credit'))
@section('header', trans('pages.admin.header.credit'))
@section('description', trans('pages.admin.description.credit'))
@section('vender_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
@stop
@section('content')
<!-- Tabs with Icon starts -->
<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="deposit-tab" data-toggle="tab" href="#deposit" aria-controls="deposit" role="tab" aria-selected="true"><i data-feather='credit-card'></i> Deposit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" aria-controls="withdraw" role="tab" aria-selected="false"><i data-feather='box'></i> Withdraw</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="deposit" aria-labelledby="deposit-tab" role="tabpanel">
                    @include('admin.credit.component.deposit')
                </div>
                <div class="tab-pane" id="withdraw" aria-labelledby="withdraw-tab" role="tabpanel">
                    @include('admin.credit.component.withdraw')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tabs with Icon ends -->
@endsection
@section('page_vendor_js')
<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
@stop

