<section id="style-order">
    <div class="card knowledge-base-bg" style="background-image: url('../../../app-assets/images/banner/banner.png');background-repeat: no-repeat">
        <div class="card-body">
            <h2 class="text-primary text-center">The Shop Style Order Board</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-5">
                <form method="post" id="form-style-order">
                    @csrf
                    <input type="hidden" name="styleId" id="styleId">
                    <input type="hidden" name="style" id="style">
                    @if(Auth::user()->role == 'Admin')
                    <div class="form-group">
                        <label>Client</label>
                        <select class="select2 form-control form-control-lg" id="select-user" name="select_user">
                            <option value="">== Select Client ==</option>
                            @if(count($clients))
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->email }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Style</label>
                        <select class="select2 form-control form-control-lg" onchange="fn_select_syle()" id="select-style">
                            <option value="">== Select Style ==</option>
                            @if(count($styles))
                            @foreach($styles as $style)
                            <option value="{{ json_encode($style) }}">{{ $style->title }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="toEmail">To Email</label>
                        <input type="text" class="form-control" id="toEmail" name="toEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group" id="div-order-button">
                        
                    </div>
                </form>
                </div>
                <div class="col-12 col-md-12 col-lg-7" style="display: flex; align-items: center; justify-content: center;" id="style-comment">

                </div>
            </div>
        </div>
    </div>
</section>
<section id="ajax-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card" style="padding:15px;">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Order Board</h4>
                </div>
                <div class="card-datatable">
                    <table class="datatables-ajax table" id="order-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width:20%;">Email</th>
                                <th style="width:10%;">Style</th>
                                <th style="width:10%;">DateTime</th>
                                <th>Link</th>
                                <th style="width:5%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade text-left" id="modal-order-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Order View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="order-part">
                    <div id="modal-body-order-view"></div>
                    <div style="margin-top: 10px;">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="link" style="margin-top: 10px;">Link</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-describedby="button-addon2" id="link">
                                    <div class="input-group-append" id="button-addon2">
                                        <a class="btn btn-outline-primary waves-effect" href="" id="link_check" target="_blank">Go</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="fp-default">Expiry Date</label>
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="YYYY-MM-DD" />
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="order_status">Order Status</label>
                                <select class="form-control" id="order_status">
                                    <option value="Active">Active</option>
                                    <option value="Order">Order</option>
                                    <option value="Expiryed">Expiryed</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="view_status">View Status</label>
                                <select class="form-control" id="view_status">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="fn_process_order()">Save</button>
                <button type="button" class="btn btn-danger" onclick="fn_remove_order()" class="close" data-dismiss="modal" aria-label="Close">Remove</button>
            </div>
        </div>
    </div>
</div>
