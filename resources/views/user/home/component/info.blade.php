<section id="alrams & joinus">
    <div class="text-center">
        <h1 class="mt-2">Alarms & Join Us</h1>
        <p class="mb-2 pb-75">
            My Clients! Please read the following texts. You can select your best products. Please Join Us.
        </p>
    </div>
    <div class="row">
        <!-- User Alert Section -->
        <div class="col-lg-8 col-12">
            <div class="card card-user-timeline">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i data-feather="list" class="user-timeline-title-icon"></i>
                        <h4 class="card-title">Alarms</h4>
                    </div>
                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                </div>
                <div class="card-body">
                    <ul class="timeline ml-50">
                        @if(count($notices))
                        @foreach($notices as $notice)
                        @if($notice->type == 'Notice')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-success">
                                <i data-feather="file-text"></i>
                            </span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>{{ $notice->title }}</h6>
                                    <span class="timeline-event-time mr-1">{{ $notice->created_at }}</span>
                                </div>
                                <p style="white-space: pre-line;">
                                    {{ $notice->content }}
                                </p>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!--/ User Alert Section -->
        <!-- Join Section -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-developer-meetup">
                <div class="meetup-img-wrapper rounded-top text-center">
                    <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                </div>
                <div class="card-body">
                    <div class="meetup-header d-flex align-items-center">
                        <div class="meetup-day">
                            <h5 class="mb-0">TELEGRAM</h6>
                                <h5 class="mb-0">ICQ</h3>
                        </div>
                        <div class="my-auto">
                            <h4 class="card-title mb-25">PLEASE JOIN US</h4>
                            <p class="card-text mb-0">You can get our service in telegram and icq.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="avatar bg-light-info rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="user-plus" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">TELEGRAM</h6>
                            <small>Click Here.</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="avatar bg-light-success rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="user-plus" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">ICQ</h6>
                            <small>Click Here.</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="avatar bg-light-info rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="user-plus" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">TELEGRAM GROUP</h6>
                            <small>Click Here.</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="avatar bg-light-success rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="user-plus" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">ICQ GROUP</h6>
                            <small>Click Here.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Join Section -->
    </div>
</section>
<section>
    <div class="text-center">
        <h1 class="mt-2">Cookie Page Order</h1>
        <p class="mb-2 pb-75">
            My Clients! Please order our cookie grab pages.
        </p>
    </div>
    <div class="row">
        
    </div>
</section>