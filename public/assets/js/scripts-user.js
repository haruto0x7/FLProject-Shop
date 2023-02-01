(function (window, undefined) {
    
    /*
    NOTE:
    ------
    PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
    WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var isRtl = $('html').attr('data-textdirection') === 'rtl';

    const router = {
        getorder: "/ajax/getorder",
        addorder: "/ajax/addorder",
    }

    var tb_order_manage = $("#order-table");

    if (tb_order_manage.length){
        tb_order_manage.DataTable({
           processing: true,
           serverSide: true,
           language: {
               sLengthMenu: 'Show _MENU_',
               search: 'Search',
               searchPlaceholder: 'Search..',
               paginate: {
                   // remove previous & next text from pagination
                   previous: '&nbsp;',
                   next: '&nbsp;'
               }
           },
           order:[5,'desc'],
           ajax: router.getorder,
           "lengthMenu": [[10, 50, 200, 1000000000], [10, 50, 200, "All"]],
           "pageLength": 10,
           columns: [
               {data: 'id', name: 'id', "visible": false},
               {data: 'title', name: 'title'},
               {data: 'link', name: 'link'},
               {data: 'price', name: 'price'},
               {data: 'status', name: 'status'},
               {data: 'create', name: 'create'},
           ],
           columnDefs: [
               {
                 // For Responsive
                 className: 'control',
                 orderable: false,
                 responsivePriority: 2,
                 targets: 0
               },
           ],
           dom:'<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
               '<"col-lg-12 col-xl-6" l>' +
               '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
               '>t' +
               '<"d-flex justify-content-between mx-2 row mb-1"' +
               '<"col-sm-12 col-md-6"i>' +
               '<"col-sm-12 col-md-6"p>' +
               '>',
           buttons: [
               {
                 text: 'New Order',
                 className: 'add-new btn btn-primary mt-50',
                 attr: {
                   'data-toggle': 'modal',
                   'data-target': '#modal-order-add-in'
                 },
                 init: function (api, node, config) {
                   $(node).removeClass('btn-secondary');
                 }
               }
           ],
       });
    }

    var select_cookie_page;

    fn_select_page=()=>{
        select_cookie_page = JSON.parse($("#default-select").val());
        var data = select_cookie_page;

        if (!jQuery.isEmptyObject( data )) {
            $("#page-details-title").text(data.title);
            $("#page-details-price").text("$ " + data.price);
            $("#page-details-comment").text(data.comment);
            $("#page-details-youtube").attr("href", data.youtube_url);
            if (data.status == 'Active') {
                $("#page-details-status").html('Available - <span class="text-success">In Stock</span>');
            } else if(data.status == 'Block') {
                $("#page-details-status").html('Available - <span class="text-warning">Not Ready</span>');
            }
            $("#page-details").css("display", "block");
        } else {
            $("#page-details").css("display", "none");
        }
    }

    fn_add_order = () => {
        $.ajax({
            url: router.addorder,
            type:"POST",
            data: {
                idx: select_cookie_page.id,
            },
            dataType: 'JSON',
            success: (response) => {
                if(response.success){
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#order-table").DataTable().ajax.reload();
                }
            },
            error: () => {
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            complete: ()=> {
                $("#modal-order-add-in").modal('hide');
            }
        });
    }
})(window);
