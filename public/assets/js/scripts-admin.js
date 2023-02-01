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

    /**
     * Admin Manage Page
     * ----------------------------------------------------------------------------
     */

    const router = {
        getuser: "/admin/ajax/getuser",
        edituser: "/admin/ajax/edituser",
        getinfo: "/admin/ajax/getinfo",
        addinfo: "/admin/ajax/addinfo",
        getrowinfo: "/admin/ajax/getrowinfo",
        editinfo: "/admin/ajax/editinfo",
        deleteinfo: "/admin/ajax/deleteinfo",
        getanalytic: "/admin/ajax/getanalytic",

        styleorder: "/admin/ajax/styleorder",
        getorder: "/admin/ajax/getorder",
        saveorder: "/admin/ajax/saveorder",
        deleteorder: "/admin/ajax/deleteorder",
        getlinks: "/admin/ajax/getlinks",
        expirylinks: "/admin/ajax/expirylinks",

        getstyle: "/admin/ajax/getstyle",
        addstyle: "/admin/ajax/addstyle",
        editstyle: "/admin/ajax/editstyle",
        deletestyle: "/admin/ajax/deletestyle",

    }
    
    var tb_user_manage = $("#user-table");
    var modal_user_edit = $("#modals-users-in");
    
    if (tb_user_manage.length){
        
        tb_user_manage.DataTable({
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
            ajax: router.getuser,
            "lengthMenu": [[10, 50, 200, 1000000000], [10, 50, 200, "All"]],
            "pageLength": 10,
            columns: [
                {data: 'id', name: 'id', "visible": false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'telegramid', name: 'telegramid'},
                {data: 'icqid', name: 'icqid'},
                {data: 'role', name: 'role'},
                {data: 'status', name: 'status'},
                {data: 'join', name: 'join'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {
                  // For Responsive
                  className: 'control',
                  orderable: false,
                  responsivePriority: 2,
                  targets: 0
                },
                {
                    // Actions
                    targets: 8,
                    title: 'action',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="btn-group">' +
                                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                    '<a data-toggle="modal" data-target="#modals-users-in" class="dropdown-item">' +
                                    feather.icons['archive'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Edit</a>' +
                                '</div>' +
                            '</div>'
                        );
                    },
                },
                {
                    // User Role
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $role = full['role'];
                        var roleBadgeObj = {
                            User: feather.icons['user'].toSvg({ class: 'font-medium-3 text-primary mr-50' }),
                            Admin: feather.icons['slack'].toSvg({ class: 'font-medium-3 text-danger mr-50' })
                        };
                        return "<span class='text-truncate align-middle'>" + roleBadgeObj[$role] + $role + '</span>';
                    }
                },
                {
                    // User Status
                    targets: 6,
                    title: 'status',
                    render: function (data, type, full, meta) {
                        var $status = full['status'];
                        var statusObj = {
                            Active: { title: 'Active', class: 'badge-light-success' },
                            Block: { title: 'Block', class: 'badge-light-secondary' }
                        };
                        return (
                            '<span class="badge badge-pill ' +
                                statusObj[$status].class +
                            '" text-capitalized>' +
                                statusObj[$status].title +
                            '</span>'
                      );
                    }
                },
            ]
        });
    }
    
    var user_row_data;

    tb_user_manage.on('click', 'tr', function () {
        user_row_data = $("#user-table").DataTable().row(this).data();
        if(user_row_data != null){
            $("#user_id").val(user_row_data.id);
            $("#user_name").val(user_row_data.name);
            $("#user_email").val(user_row_data.email);
            $("#user_role").val(user_row_data.role);
            $("#user_status").val(user_row_data.status);
            $("#user_join").val(user_row_data.join);
        }
    });

    fn_submit_user = () => {
        
        var form = $("#form-edit-user")[0];
        var data = new FormData(form);

        $.ajax({
            url: router.edituser,
            type:"POST",
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            dataType:"json",
            success:(data)=>{
                if(data.success){
                    modal_user_edit.modal('hide');
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#user-table").DataTable().ajax.reload();
                }else{
                    toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
                }
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            complete:()=>{
                form.reset();
            }
        });
    }

    /**
     * Admin Information Page
     * ----------------------------------------------------------------------------
     */
    
    var tb_info_manage = $("#information-table");

     if (tb_info_manage.length){
        
        tb_info_manage.DataTable({
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
            order:[4,'desc'],
            ajax: router.getinfo,
            "lengthMenu": [[10, 50, 200, 1000000000], [10, 50, 200, "All"]],
            "pageLength": 10,
            columns: [
                {data: 'id', name: 'id', "visible": false},
                {data: 'title', name: 'title'},
                {data: 'type', name: 'type'},
                {data: 'create', name: 'create'},
                {data: 'update', name: 'update'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {
                  // For Responsive
                  className: 'control',
                  orderable: false,
                  responsivePriority: 2,
                  targets: 0
                },
                {
                    // Actions
                    targets: 5,
                    title: 'action',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="btn-group">' +
                                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                    '<a onclick="fn_get_edit_info(' + full["id"] + ')" class="dropdown-item">' +
                                    feather.icons['archive'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Edit</a>' +
                                    '<a onclick="fn_get_delete_info(' + full["id"] + ')" class="dropdown-item">' +
                                    feather.icons['trash'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Delete</a>' +
                                '</div>' +
                            '</div>'
                        );
                    },
                },
                {
                    // Type
                    targets: 2,
                    title: 'type',
                    render: function (data, type, full, meta) {
                        var $types = full['type'];
                        var typesObj = {
                            Notice: { title: 'Notice', class: 'badge-light-success' },
                            Faq: { title: 'Faq', class: 'badge-light-warning' },
                            Plan: { title: 'Plan', class: 'badge-light-secondary' }
                        };
                        return (
                            '<span class="badge badge-pill ' +
                                typesObj[$types].class +
                            '" text-capitalized>' +
                                typesObj[$types].title +
                            '</span>'
                      );
                    }
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
                  text: 'Add New',
                  className: 'add-new btn btn-primary mt-50',
                  attr: {
                    'data-toggle': 'modal',
                    'data-target': '#modal-info-add-in'
                  },
                  init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                  }
                }
            ],
        });
    }

    var modal_info_add = $("#modal-info-add-in");

    fn_submit_add_info = () => {
        
        var title = $("#info_title").val();
        var content = $("#info_content").val();
        
        if(title == "" || content == ""){
            toastr['warning']('👋 All fields are required.', 'Warning', { timeOut: 2000, rtl: isRtl });
            return;
        }

        var form = $("#form-add-info")[0];
        var data = new FormData(form);

        $.ajax({
            url: router.addinfo,
            type:"POST",
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            dataType:"json",
            success:(data)=>{
                if(data.success){
                    modal_info_add.modal('hide');
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#information-table").DataTable().ajax.reload();
                    return
                }
                if(!data.validation) {
                    toastr['warning']('👋 Invalid form data!', 'Warning', { timeOut: 2000, rtl: isRtl });
                    return;
                }
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            complete:()=>{
                form.reset();
            }
        });
    }

    var modal_info_edit = $("#modal-info-edit-in");
    
    fn_get_edit_info = (id) => {
        $.ajax({
            url: router.getrowinfo,
            type:"POST",
            data: {
                row_id: id
            },
            dataType: 'JSON',
            success:(data)=>{
                if(data.success){
                    $("#edit_info_id").val(data.result.id);
                    $("#edit_info_title").val(data.result.title);
                    $("#edit_info_content").text(data.result.content);
                    $("#edit_info_type").val(data.result.type);
                    $("#edit_info_create").val(data.result.created_at);
                    $("#edit_info_update").val(data.result.updated_at);
                    modal_info_edit.modal('show');
                }
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            }
        });
    }

    fn_submit_edit_info = () => {

        var title = $("#edit_info_title").val();
        var content = $("#edit_info_content").val();
        
        if(title == "" || content == ""){
            toastr['warning']('👋 All fields are required.', 'Warning', { timeOut: 2000, rtl: isRtl });
            return;
        }

        var form = $("#form-edit-info")[0];
        var data = new FormData(form);

        $.ajax({
            url: router.editinfo,
            type:"POST",
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            dataType:"json",
            success:(data)=>{
                if(data.success){
                    modal_info_edit.modal('hide');
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#information-table").DataTable().ajax.reload();
                    return
                }
                if(!data.validation) {
                    toastr['warning']('👋 Invalid form data!', 'Warning', { timeOut: 2000, rtl: isRtl });
                    return;
                }
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            complete:()=>{
                form.reset();
            }
        });
    }

    fn_get_delete_info = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            showClass: {
                popup: 'animate__animated animate__fadeIn'
            },
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: router.deleteinfo,
                        type:"POST",
                        data: {
                            row_id: id
                        },
                        dataType: 'JSON',
                        success:(data)=>{
                            if(data.success){
                                $("#information-table").DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            }
                        },
                        error:()=>{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                customClass: {
                                  confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                }
            }
        );
    }
    
    /**
     * Style Page
     * ----------------------------------------------------------------------------
     */

    var tb_style_manage = $("#style-table");

    if (tb_style_manage.length){
        
        tb_style_manage.DataTable({
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
            order:[4,'desc'],
            ajax: router.getstyle,
            "lengthMenu": [[10, 50, 200, 1000000000], [10, 50, 200, "All"]],
            "pageLength": 10,
            columns: [
                {data: 'id', name: 'id', "visible": false},
                {data: 'title', name: 'title'},
                {data: 'price', name: 'price'},
                {data: 'status', name: 'status'},
                {data: 'buyed', name: 'buyed'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {
                  // For Responsive
                  className: 'control',
                  orderable: false,
                  responsivePriority: 2,
                  targets: 0
                },
                {
                    // Actions
                    targets: 5,
                    title: 'action',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="btn-group">' +
                                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                    '<a onclick="fn_get_edit_style(' + full["id"] + ')" class="dropdown-item">' +
                                    feather.icons['archive'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Edit</a>' +
                                    '<a onclick="fn_get_delete_style(' + full["id"] + ')" class="dropdown-item">' +
                                    feather.icons['trash'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Delete</a>' +
                                '</div>' +
                            '</div>'
                        );
                    },
                },
                {
                    // Type
                    targets: 3,
                    title: 'status',
                    render: function (data, type, full, meta) {
                        var $types = full['status'];
                        var typesObj = {
                            Active: { title: 'Active', class: 'badge-light-success' },
                            Block: { title: 'Block', class: 'badge-light-secondary' }
                        };
                        return (
                            '<span class="badge badge-pill ' +
                                typesObj[$types].class +
                            '" text-capitalized>' +
                                typesObj[$types].title +
                            '</span>'
                      );
                    }
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
                  text: 'Add New',
                  className: 'add-new btn btn-primary mt-50',
                  attr: {
                    'data-toggle': 'modal',
                    'data-target': '#modal-style-add-in'
                  },
                  init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                  }
                }
            ],
        });
    }

    var style_row_data;

    tb_style_manage.on('click', 'tr', function () {
        style_row_data = $("#style-table").DataTable().row(this).data();
    });

    var modal_style_add = $("#modal-style-add-in");

    fn_submit_add_style = () => {
        
        var title = $("#style_title").val();
        var comment = $("#style_comment").val();
        var price = $("#style_price").val();
        
        if(title == "" || comment == "" || price == ""){
            toastr['warning']('👋 All fields are required.', 'Warning', { timeOut: 2000, rtl: isRtl });
            return;
        }

        var form = $("#form-add-style")[0];
        var data = new FormData(form);

        $.ajax({
            url: router.addstyle,
            type:"POST",
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            dataType:"json",
            success:(data)=>{
                if(data.success){
                    modal_style_add.modal('hide');
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#style-table").DataTable().ajax.reload();
                    return;
                }
                if(!data.validation) {
                    toastr['warning']('👋 Invalid form data!', 'Warning', { timeOut: 2000, rtl: isRtl });
                    return;
                }
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            complete:()=>{
                form.reset();
            }
        });
    }

    var modal_style_edit = $("#modal-style-edit-in");

    fn_get_edit_style = () => {
        if(style_row_data != null){
            $("#edit_style_id").val(style_row_data.id);
            $("#edit_style_title").val(style_row_data.title);
            $("#edit_style_prices").val(style_row_data.price);
            $("#edit_style_youtube_url").val(style_row_data.youtube_url);
            $("#edit_style_status").val(style_row_data.status);
            $("#edit_style_comment").val(style_row_data.comment);
        }
        modal_style_edit.modal('show');
    }

    fn_submit_edit_style = () => {

        var title = $("#edit_style_title").val();
        var comment = $("#edit_style_comment").val();
        var price = $("#edit_style_price").val();
        
        if(title == "" || comment == "" || price == ""){
            toastr['warning']('👋 All fields are required.', 'Warning', { timeOut: 2000, rtl: isRtl });
            return;
        }

        var form = $("#form-edit-style")[0];
        var data = new FormData(form);

        $.ajax({
            url: router.editstyle,
            type:"POST",
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            dataType:"json",
            success:(data)=>{
                if(data.success){
                    modal_style_edit.modal('hide');
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#style-table").DataTable().ajax.reload();
                    return;
                }
                if(!data.validation) {
                    toastr['warning']('👋 Invalid form data!', 'Warning', { timeOut: 2000, rtl: isRtl });
                    return;
                }
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
            complete:()=>{
                form.reset();
            }
        });
    }

    fn_get_delete_style = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            showClass: {
                popup: 'animate__animated animate__fadeIn'
            },
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: router.deletestyle,
                        type:"POST",
                        data: {
                            row_id: id
                        },
                        dataType: 'JSON',
                        success:(data)=>{
                            if(data.success){
                                $("#style-table").DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            }
                        },
                        error:()=>{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                customClass: {
                                  confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                }
            }
        );
    }

    /**
     * Shop Page
     * ----------------------------------------------------------------------------
     */

    var style_row_data;

    fn_select_syle = () => {
        var style_data = $("#select-style").val();
        console.log(style_data);
        if(!style_data){
            $("#div-order-button").html("");
            return ;
        }else{
            style_row_data = JSON.parse(style_data);
            $("#style").val(style_row_data.style);
            $("#styleId").val(style_row_data.id);
            $("#div-order-button").html('<label for="placeOrder"></label><button type="button" class="btn btn-primary btn-block waves-effect waves-float waves-light" id="placeOrder" onclick="fn_place_order()"><i data-feather="shopping-cart" class="mr-50"></i><span class="add-to-cart">Place Order</span></button>');
            $("#style-comment").text(style_row_data.comment);
        }
    }
    fn_place_order = () => {
        
        var form = $("#form-style-order")[0];
        var data = new FormData(form);

        $.ajax({
            url: router.styleorder,
            type:'POST',
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 120000,
            dataType:"json",
            success:(response)=>{
                if(response.success){
                    toastr['success']('👋 Your activity was successful!', 'Success', { timeOut: 2000,  rtl: isRtl });
                    $("#order-table").DataTable().ajax.reload();
                }
            },
            error:()=>{
                toastr['error']('👋 Something went wrong in server!', 'Error', { timeOut: 2000,  rtl: isRtl });
            },
        });
    };

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
            order:[3,'desc'],
            ajax: router.getorder,
            "lengthMenu": [[10, 50, 200, 1000000000], [10, 50, 200, "All"]],
            "pageLength": 10,
            columns: [
                {data: 'id', name: 'id', "visible": false},
                {data: 'email', name: 'email'},
                {data: 'style', name: 'style'},
                {data: 'datetime', name: 'datetime'},
                {data: 'link', name: 'link'},
                {data: 'status', name: 'status'}
            ],
            columnDefs: [
                {
                  // For Responsive
                  className: 'control',
                  orderable: false,
                  responsivePriority: 2,
                  targets: 0
                },
                {
                    // Actions
                    targets: 5,
                    title: 'status',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            "<a>"+full['status']+"</a><br>\
                             <a>"+full['view']+"</a>"
                        );
                    },
                }
            ]
        });

        var order_row_data;

        tb_order_manage.on('click', 'tr', function () {
            order_row_data = $("#order-table").DataTable().row(this).data();
            if (order_row_data != null) {

                $("#expiry_date").val(order_row_data.expiryed_at);
                $("#view_status").val(order_row_data.view);
                $("#order_status").val(order_row_data.status);
                $("#link").val(order_row_data.link);
                $("#link_check").attr('href', order_row_data.link);
                $("#modal-order-view").modal('show');
            }
        });
    }
    fn_process_order = () => {
        $.ajax({
            url: router.saveorder,
            type:"POST",
            data: {
                row: order_row_data.id,
                view: $("#view_status").val(),
                link: $("#link").val(),
                expiry: $("#expiry_date").val(),
                status: $("#order_status").val(),
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
            }
        });
    }

    /**
     * Admin Analytic Page
     * ----------------------------------------------------------------------------
     */
    
     var tb_analytic_manage = $("#analytic-table");

     if (tb_analytic_manage.length){
        
        tb_analytic_manage.DataTable({
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
            order:[6,'desc'],
            ajax: router.getanalytic,
            "lengthMenu": [[10, 50, 200, 1000000000], [10, 50, 200, "All"]],
            "pageLength": 10,
            columns: [
                {data: 'id', name: 'id', "visible": false},
                {data: 'action', name: 'action'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'ip', name: 'ip'},
                {data: 'domain', name: 'domain'},
                {data: 'datetime', name: 'datetime'},
            ],
        });
    }
    fn_remove_order = () => {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            showClass: {
                popup: 'animate__animated animate__fadeIn'
            },
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: router.deleteorder,
                        type:"POST",
                        data: {
                            row_id: order_row_data.id
                        },
                        dataType: 'JSON',
                        success:(data)=>{
                            if(data.success){
                                $("#order-table").DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Activity was successful.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            }
                        },
                        error:()=>{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                customClass: {
                                  confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                }
            }
        );
    }
    fn_expiry_links = () => {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            confirmButtonText: 'Yes, expiry all!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: router.expirylinks,
                        type:"POST",
                        dataType: 'JSON',
                        success:(data)=>{
                            if(data.success){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Expiryed!',
                                    text: 'Activity was successful.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                                $("#expiry-numbers").text(0);
                            }
                        },
                        error:()=>{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                customClass: {
                                  confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                }
            }
        );
    }
})(window);
