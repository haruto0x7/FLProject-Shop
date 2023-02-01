@extends('user._auth.layout')
@section('title')
@lang('pages.site') -> @lang('pages.title.signin')
@stop
@section('content')
<!-- Login v1 -->
<div class="card mb-0">
    <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
        
            <h2 class="brand-text text-primary ml-1">@lang('pages.name')</h2>
        </a>

        <h4 class="card-title mb-1">Welcome to @lang('pages.site')! 👋</h4>
        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

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
        <form class="auth-login-form mt-2" action="{{ route('auth.signin') }}" method="POST">
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

        <p class="text-center mt-2">
        <span>New on our platform?</span>
        <a href="{{ route('signup') }}">
            <span>Create an account</span>
        </a>
        </p>

        {{-- <div class="divider my-2">
        <div class="divider-text">or</div>
        </div>

        <div class="auth-footer-btn d-flex justify-content-center">
        <a href="javascript:void(0)" class="btn btn-facebook">
            <i data-feather="facebook"></i>
        </a>
        <a href="javascript:void(0)" class="btn btn-twitter white">
            <i data-feather="twitter"></i>
        </a>
        <a href="javascript:void(0)" class="btn btn-google">
            <i data-feather="mail"></i>
        </a>
        <a href="javascript:void(0)" class="btn btn-github">
            <i data-feather="github"></i>
        </a>
        </div> --}}
    </div>
</div>
<!-- /Login v1 -->
@stop

