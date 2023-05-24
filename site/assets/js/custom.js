$(document).ready(function (){

    $('.quantity-right-plus').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.quantity-left-minus').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.quantity-right-plus').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty1').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty1').val(value);
        }
    });

    $('.quantity-left-minus').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty1').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty1').val(value);
        }
    });

    $('.addToCartBtn').click(function (e){
        e.preventDefault();
    
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var prod_id = $(this).val();
        
        var price = $(this).closest('.product_data').find('.cost').val();        


        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,  
                "price": price,  
                "scope": "add"
            },            
            success: function(response){

                if(response ==201)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item Successfully added to your cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                    $('#mycart').load(location.href + " #mycart");
                }

                else if(response == 500)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Product already in cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }

                else if(response ==401)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Login to add cart item",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }                
            }
        });

    });

    //From Product Listing VIew

    $('.addToCartBtn1').click(function (e){
        e.preventDefault();
    
        var qty = 1;
        
        var prod_id = $(this).val();
        
        var price = $(this).closest('.product_data').find('.cost').val();        


        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,  
                "price": price,  
                "scope": "add"
            },            
            success: function(response){

                if(response ==201)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item Successfully added to your cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                    $('#mycart').load(location.href + " #mycart");
                }

                else if(response == 500)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Product already in cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }

                else if(response ==401)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Login to add cart item",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }                
            }
        });

    });

    //From Wishlist.PHP Page

    $('.addToCartBtn2').click(function (e){
        e.preventDefault();
    
        var qty = 1;
        
        var prod_id = $(this).val();
        
        var price = $(this).closest('.product_data').find('.cost').val();        


        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,  
                "price": price,  
                "scope": "add"
            },            
            success: function(response){

                if(response ==201)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item Successfully added to your cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                    $('#mycart').load(location.href + " #mycart");
                }

                else if(response == 500)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Product already in cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }

                else if(response ==401)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Login to add cart item",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }                
            }
        });

    });

    $('.addToWishlistBtn').click(function (e){
        e.preventDefault();
    
        var qty = 1;
        
        var prod_id = $(this).val();
        
        var price = $(this).closest('.product_data').find('.cost').val();        


        $.ajax({
            method: "POST",
            url: "functions/handle-wishlist.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,  
                "price": price,  
                "scope": "add"  
            },            
            success: function(response){

                if(response ==201)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item Successfully added to your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                    $('#mywishnum').load(location.href + " #mywishnum");
                }

                else if(response == 501)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Product already in your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }

                else if(response ==401)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Login to add to your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }                
            }
        });

    });

    $('.addWishBtn').click(function (e){
        e.preventDefault();
    
        var qty = 1;
        
        var prod_id = $(this).val();
        
        var price = $(this).closest('.product_data').find('.cost').val();        
 

        $.ajax({
            method: "POST",
            url: "functions/handle-wishlist.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,  
                "price": price,  
                "scope": "add" 
            },            
            success: function(response){

                if(response ==201)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item Successfully added to your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }

                else if(response == 501)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Product already in your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }

                else if(response ==401)
                {
                    $.notify({
                        icon: "fa fa-times",
                        title: "Oops!",
                        message: "Login to add to your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "danger",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });
                }                
            }
        });

    });


    //Delete Cart Items

    $(document).on('click','.deleteItem',  function () {
        
        var cid = $(this).val();

 
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cid": cid, 
                "scope": "delete"
            },            
            success: function(response){

                if(response ==200)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item successfully deleted from cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });

                    $('#mycart').load(location.href + " #mycart");
                    $('#mycarttable').load(location.href + " #mycarttable");
                }
                else if (response == 500)
                {
                    alert("Something went wrong");
                }               
            }
        });
                  
    });

    $(document).on('click','.deleteAll',  function () {
        
        var userid = $(this).val(); 
        
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "userid": userid, 
                "scope": "deleteAll"
            },            
            success: function(response){

                if(response ==200)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "All Items successfully deleted from cart",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });

                    $('#mycart').load(location.href + " #mycart");
                    $('#mycarttable').load(location.href + " #mycarttable");
                }
                else if (response == 500)
                {
                    alert("Something went wrong");
                }               
            }
        });
                  
    });


    //Delete Wishlist 

    $(document).on('click','.deleteWish',  function () {
        
        var wid = $(this).val();


        $.ajax({
            method: "POST",
            url: "functions/handle-wishlist.php",
            data: {
                "wid": wid, 
                "scope": "delete"
            },            
            success: function(response){

                if(response ==200)
                {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Success!",
                        message: "Item successfully deleted from your wishlist",
                    }, {
                        element: "body",
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,  
                        placement: {
                            from: "top",
                            align: "right",
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp",
                        },
                        icon_type: "class",
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            "</div>" +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            "</div>",
                    });

                    $('#mywish').load(location.href + " #mywish");
                    $('#mywishnum').load(location.href + " #mywishnum");
                }
                else if (response == 500)
                {
                    alert("Something went wrong");
                }               
            }
        });
                  
    });
}); 