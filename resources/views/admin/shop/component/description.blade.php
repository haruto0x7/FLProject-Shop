<section id="shop-description">
    <div class="content-body">
        <div id="user-profile">
            <!-- profile header -->
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2">
                        <!-- profile cover photo -->
                        <img class="card-img-top" src="{{asset('app-assets/images/profile/user-uploads/timeline.jpg')}}" alt="User Profile Image" />
                        <!--/ profile cover photo -->
                        <div class="position-relative">
                            <!-- profile picture -->
                            <div class="profile-img-container d-flex align-items-center">
                                <div class="profile-img">
                                    <img src="{{asset('app-assets/images/portrait/small/avatar-s-2.jpg')}}" class="rounded img-fluid" alt="Card image" />
                                </div>
                                <!-- profile title -->
                                <div class="profile-title ml-3">
                                    <h2 class="text-white">{{ Auth::user()->name }}</h2>
                                    <p class="text-white">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- tabs pill -->
                        <div class="profile-header-nav">
                            <!-- navbar -->
                            <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i data-feather="align-justify" class="font-medium-5"></i>
                                </button>

                                <!-- collapse  -->
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                        <div>
                                            <strong style="color:white;">Welcome to our shop. May the wealth coming to you and you stay blessed by god let's get started, Shall we!</strong>
                                        </div>
                                    </div>
                                </div>
                                <!--/ collapse  -->
                            </nav>
                            <!--/ navbar -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ profile header -->
        </div>
    </div>
</section>
