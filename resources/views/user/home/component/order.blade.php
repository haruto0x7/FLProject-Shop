<section id="style-order">
    <div class="row">
        <div class="col-12">
            <div class="card" style="padding:15px;">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table" id="order-table">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th style="width: 20%;">Page</th>
                                <th>Link</th>
                                <th style="width: 7%;">Price($)</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 10%;">Created</th>
                            </tr>
                        </thead>
                    </table>
                    <tbody>

                    </tbody>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Add Modal -->
    <div class="modal fade text-left" id="modal-order-add-in" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-add-style" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="default-select">Pages</label>
                            <select class="select2 form-control" id="default-select" onchange="fn_select_page();">
                                <option value="{}">== Select Page ==</option>
                                @foreach ($styles as $style)
                                <option value="{{ json_encode($style) }}">{{ $style->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <!-- BEGIN: Content-->
                    <div class="ecommerce-application">
                        <div class="content-wrapper">
                            <div class="content-body">
                                <!-- app e-commerce details start -->
                                <section class="app-ecommerce-details">
                                    <!-- Product Details starts -->
                                    <div class="row my-2">
                                        <div class="col-12 col-md-12" id="page-details" style="display: none">
                                            <section>
                                                <h4 id="page-details-title"></h4>
                                                <span class="card-text item-company">BY <a href="javascript:void(0)" class="company-name">@lang('pages.team')</a></span>
                                                <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                                    <h4 class="item-price mr-1" id="page-details-price"></h4>
                                                    <ul class="unstyled-list list-inline pl-1 border-left">
                                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                    </ul>
                                                </div>
                                                <p class="card-text" id="page-details-status"></p>
                                                <p class="card-text" style="white-space: pre-line;" id="page-details-comment">
                                                    
                                                </p>
                                                <ul class="product-features list-unstyled">
                                                    <li><i data-feather="shopping-cart"></i> <span>Shipping: For 1 hour</span></li>
                                                    <li><i data-feather='clock'></i> <span>Available: For 1 month</span></li>
                                                </ul>
                                                <hr />
                                                <div class="d-flex flex-column flex-sm-row pt-1">
                                                    <a href="javascript:fn_add_order();"
                                                        class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                                        <i data-feather="shopping-cart" class="mr-50"></i>
                                                        <span class="add-to-cart">Add to cart</span>
                                                    </a>
                                                    <a href="javascript:void(0)" id="page-details-youtube" target="_blank" class="btn btn-outline-secondary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                                        <i data-feather="youtube" class="mr-50"></i>
                                                        <span>Youtube</span>
                                                    </a>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <!-- Product Details ends -->
                                </section>
                                <!-- app e-commerce details end -->
                            </div>
                        </div>
                    </div>
                    <!-- END: Content-->
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal End -->