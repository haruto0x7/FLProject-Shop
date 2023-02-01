@extends('admin._auth.layout')
@section('title')
@lang('pages.title.admin.signin')
@stop
@section('leftside')
<img class="img-fluid" src="{{asset('app-assets/images/pages/login-v2-dark.svg')}}" alt="Login V2" />
@stop
@section('content')
<!-- Login-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title font-weight-bold mb-1">Welcome to @lang('pages.site') Admin 👋</h2>
        <p class="card-text mb-2">Please sign-in to your account.</p>
        <div class="demo-spacing-0">
            @if ($errors->has('credentials'))
            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                <div class="alert-body">
                    <i data-feather="info" class="mr-50 align-middle"></i>
                    <span><strong>Invalid</strong>. {{ $errors->first('credentials') }}</span>
                </div>
            </div>
            @endif
            @if ($errors->has('validator'))
            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                <div class="alert-body">
                    <i data-feather="info" class="mr-50 align-middle"></i>
                    <span><strong>Validator</strong>. {{ $errors->first('validator') }}</span>
                </div>
            </div>
            @endif
            @if ($errors->has('block'))
            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                <div class="alert-body">
                    <i data-feather="info" class="mr-50 align-middle"></i>
                    <span><strong>Block</strong>. {{ $errors->first('block') }}</span>
                </div>
            </div>
            @endif
        </div>
        <form class="auth-login-form mt-2" action="{{ route('auth.admin.signin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="login_email">Email</label>
                <input class="form-control" id="login_email" type="text" name="login_email" placeholder="" aria-describedby="login_email" autofocus="" tabindex="1" />
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="login_password" type="password" name="login_password" placeholder="" aria-describedby="login_password" tabindex="2" />
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="remember_me" name="remember_me" type="checkbox" tabindex="3" />
                    <label class="custom-control-label" for="remember_me"> Remember Me</label>
                </div>
            </div>
            <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
        </form>
    </div>
</div>
<!-- /Login-->
@stop