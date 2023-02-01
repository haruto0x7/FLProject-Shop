<!-- account setting page -->
<section id="page-account-settings">
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column nav-left">
                <!-- general -->
                <li class="nav-item">
                    <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">General</span>
                    </a>
                </li>
                <!-- change password -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--/ left menu section -->

        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- form -->
                            <form class="validate-form mt-2">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-name">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-e-mail">E-mail</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-e-mail">Telegram</label>
                                            <input type="text" class="form-control" name="telegramid" value="{{ Auth::user()->telegramid }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-e-mail">ICQ</label>
                                            <input type="text" class="form-control" name="icqid" value="{{ Auth::user()->icqid }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-e-mail">Role</label>
                                            <input type="text" class="form-control" name="role" value="{{ Auth::user()->role }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-e-mail">Status</label>
                                            <input type="text" class="form-control" name="status" value="{{ Auth::user()->status }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-company">Join</label>
                                            <input type="text" class="form-control" name="join" value="{{ Auth::user()->created_at }}" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->

                        <!-- change password -->
                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                            <!-- form -->
                            <form class="validate-form" action="{{ route('profile.password') }}" id="form-profile-password" type="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account_old_password">Old Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account_old_password" name="account_old_password" placeholder="Old Password" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account_new_password">New Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="account_new_password" name="account_new_password" class="form-control" placeholder="New Password" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account_retype_new_password">Retype New Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account_retype_new_password" name="account_retype_new_password" placeholder="New Password" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                                        @if ($errors->has('confirm'))
                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body">
                                                <i data-feather="info" class="mr-50 align-middle"></i>
                                                <span><strong>Confirm</strong>. {{ $errors->first('confirm') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($errors->has('success'))
                                        <div class="alert alert-success mt-1 alert-validation-msg" role="alert">
                                            <div class="alert-body">
                                                <i data-feather="info" class="mr-50 align-middle"></i>
                                                <span><strong>Success</strong>. {{ $errors->first('success') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ change password -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ right content section -->
    </div>
</section>