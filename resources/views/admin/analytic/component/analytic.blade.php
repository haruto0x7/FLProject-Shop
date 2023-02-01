<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
    <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img src="{{asset('app-assets/images/elements/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                    <img src="{{asset('app-assets/images/elements/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="award" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">Congratulations {{ Auth::user()->name }}</h1>
                        <p class="card-text m-auto w-75">
                            You can see total info of site in here. Okay?
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Greetings Card ends -->

        <!-- Subscribers Chart Card starts -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $users }}</h2>
                    <p class="card-text">Total Users</p>
                </div>
                <div id="gained-chart"></div>
            </div>
        </div>
        <!-- Subscribers Chart Card ends -->

        <!-- Orders Chart Card starts -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="package" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1"></h2>
                    <p class="card-text">Total Styles</p>
                </div>
                <div id="order-chart"></div>
            </div>
        </div>
        <!-- Orders Chart Card ends -->
    </div>

    <div class="row match-height">
        <!-- Avg Sessions Chart Card starts -->
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row pb-50">
                        <div class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                            <div class="mb-1 mb-sm-0">
                                <h4 class="font-weight-bolder mb-25">Total Order Analytic</h4>
                                <p class="card-text font-weight-bold mb-2">Total Orders: {{ $style_orders+$active_orders+$expiry_orders+$cancel_orders }}</p>
                                <div class="font-medium-2">
                                    <span class="text-success mr-25" id="expiry-numbers">{{ $expirys }}</span>
                                    <span>Today Expiry Orders</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="fn_expiry_links();">Expiry Links</button>
                        </div>
                        <div class="col-sm-6 col-12 d-flex justify-content-between flex-column text-right order-sm-2 order-1">
                            <p>All Days</p>
                            <div id="avg-sessions-chart"></div>
                        </div>
                    </div>
                    <hr />
                    <div class="row avg-sessions pt-50">
                        <div class="col-6 mb-2">
                            <p class="mb-50">Style Orders: {{ $style_orders }}</p>
                            <div class="progress progress-bar-primary" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $style_orders }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $style_orders }}%"></div>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <p class="mb-50">Active Orders: {{ $active_orders }}</p>
                            <div class="progress progress-bar-warning" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $active_orders }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $active_orders }}%"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="mb-50">Expiryed Orders: {{ $expiry_orders }}</p>
                            <div class="progress progress-bar-danger" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $expiry_orders }}/100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $expiry_orders }}/100%"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="mb-50">Cancel Orders: {{ $cancel_orders }}</p>
                            <div class="progress progress-bar-success" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $cancel_orders }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $cancel_orders }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Avg Sessions Chart Card ends -->

        <!-- Support Tracker Chart Card starts -->
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h4 class="card-title">Today Shop Analytic</h4>
                    <div class="dropdown chart-dropdown">
                        <p>Today</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                            <h1 class="font-large-2 font-weight-bolder mt-2 mb-0">$</h1>
                            <p class="card-text">Credit</p>
                            <h1 class="font-large-2 font-weight-bolder mt-2 mb-0">{{ $today_active_orders }}</h1>
                            <p class="card-text">Active Links</p>
                        </div>
                        <div class="col-sm-10 col-12 d-flex justify-content-center">
                            <div id="support-trackers-chart"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <div class="text-center">
                            <p class="card-text mb-50">Today Order Count</p>
                            <span class="font-large-1 font-weight-bold">{{ $today_style_orders }}</span>
                        </div>
                        <div class="text-center">
                            <p class="card-text mb-50">Today SignIn Users</p>
                            <span class="font-large-1 font-weight-bold">{{ $today_signin_users }}</span>
                        </div>
                        <div class="text-center">
                            <p class="card-text mb-50">Today SignUp Users</p>
                            <span class="font-large-1 font-weight-bold">{{ $today_signup_users }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Tracker Chart Card ends -->
    </div>
    <div class="text-center">
        <h1 class="mt-2">Visit & Access History</h1>
        <p class="mb-2 pb-75">
            You can see all access & visit history in this table.
        </p>
    </div>
    <!-- List DataTable -->
    <div class="row">
        <div class="col-12">
            <div class="card" style="padding:15px;">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table" id="analytic-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Client</th>
                                <th>Email</th>
                                <th>Ip</th>
                                <th>Domain</th>
                                <th>Datetime</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ List DataTable -->
</section>
<!-- Dashboard Analytics end -->