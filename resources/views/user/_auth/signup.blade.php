@extends('user._auth.layout')
@section('title')
@lang('pages.site') -> @lang('pages.title.signup')
@stop
@section('content')
<!-- Login v1 -->
<div class="card mb-0">
    <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
            <h2 class="brand-text text-primary ml-1">@lang('pages.name')</h2>
        </a>

        <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
        <p class="card-text mb-2">Make your app management easy and fun!</p>

        @if($errors->has('validator'))
        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
            <div class="alert-body">
                <i data-feather="info" class="mr-50 align-middle"></i>
                <span><strong>Validator</strong>. {{ $errors->first('validator') }}</span>
            </div>
        </div>
        @endif
        @if($errors->has('confirm'))
        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
            <div class="alert-body">
                <i data-feather="info" class="mr-50 align-middle"></i>
                <span><strong>Confirm</strong>. {{ $errors->first('confirm') }}</span>
            </div>
        </div>
        @endif
        @if($errors->has('credentials'))
        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
            <div class="alert-body">
                <i data-feather="info" class="mr-50 align-middle"></i>
                <span><strong>Credentials</strong>. {{ $errors->first('credentials') }}</span>
            </div>
        </div>
        @endif
        @if($errors->has('email'))
        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
            <div class="alert-body">
                <i data-feather="info" class="mr-50 align-middle"></i>
                <span><strong>Email</strong>. {{ $errors->first('email') }}</span>
            </div>
        </div>
        @endif
        @if($errors->has('exist'))
        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
            <div class="alert-body">
                <i data-feather="info" class="mr-50 align-middle"></i>
                <span><strong>Exist</strong>. {{ $errors->first('exist') }}</span>
            </div>
        </div>
        @endif
        <form class="auth-register-form mt-2" action="{{ route('auth.signup') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="register_username">Username</label>
                <input class="form-control" id="register_username" type="text" name="register_username" placeholder="johndoe" aria-describedby="register_username" autofocus="" tabindex="1" />
            </div>
            <div class="form-group">
                <label class="form-label" for="register_email">Email</label>
                <input class="form-control" id="register_email" type="text" name="register_email" placeholder="john@example.com" aria-describedby="register_email" tabindex="2" />
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label class="form-label" for="register_password">Password</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge" id="register_password" type="password" name="register_password" placeholder="············" aria-describedby="register_password" tabindex="3" />
                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label class="form-label" for="register_confirm">Confirm</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge" id="register_confirm" type="password" name="register_confirm" placeholder="············" aria-describedby="register_confirm" tabindex="4" />
                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label class="form-label" for="register_telegramid">TelegramID</label>
                        <input class="form-control" id="register_telegramid" type="text" name="register_telegramid" placeholder="Optional" aria-describedby="register_telegramid" autofocus="" tabindex="1" />
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label class="form-label" for="register_icqid">IcqID</label>
                        <input class="form-control" id="register_icqid" type="text" name="register_icqid" placeholder="Optional" aria-describedby="register_icqid" autofocus="" tabindex="1" />
                    </div>
                </div>
            </div>
            {{-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="5" />
                    <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="javascript:void(0);">&nbsp;privacy policy & terms</a></label>
                </div>
            </div> --}}
            <button class="btn btn-primary btn-block" tabindex="6">Sign up</button>
        </form>

        <p class="text-center mt-2">
        <span>Already have an account?</span>
        <a href="{{ route('index') }}">
            <span>Sign in instead</span>
        </a>
        </p>
{{-- 
        <div class="divider my-2">
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

