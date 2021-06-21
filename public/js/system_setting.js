$(document).ready(function() {
    $('#hospital_address_form').on('submit', function (e) {
        e.preventDefault();
        var url =  ($('#hospital_address_id').val() == '') ? 'store-hospital-address' : 'update-hospital-address';
        
        $.ajax({
            type: 'post',
            url: './' + url,
            data: $('#hospital_address_form').serialize(),
            success: function (response) {
                console.log(response);
                if (response.status == 1) {
                    swal({
                        title: 'Success!',
                        text: response.message,
                        type: 'success'
                    }, function() {
                        window.location.reload();
                    });
                }
                if (response.status == 2) {
                    $('.form-error-msg').text('');
                    if(response.error != null){
                        var formError = response.error;
                        $.each(formError,function(key,value){
                            $('.'+key).text(value);
                        });
                    }
                }
            },
            error: function (error) {}
        });
    });
    $('.edit-address').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: './get-hospital-address',
            data: {
                id: $(this).data('id'),
            },
            success: function (response) {
                // console.log(response);
                if (response.status == 1) {
                    $('.address').val(response.data.address);
                    $('.mobile').val(response.data.mobile);
                    $('.email').val(response.data.email);
                    $('#hospital_address_id').val(response.data.id);
                }
                if (response.status == 2) {
                    swal("Oops!", response.message, "error");
                    window.location.reload();
                }
            },
            error: function (error) {}
        });
    });

    $('.delete-address').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: 'Are you sure?',
            text: 'You want to delete this address details!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00cfd1',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
            cancelButtonClass: 'btn btn-danger',
        }, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: './delete-hospital-address',
                data: {
                    id: id,
                },
                success: function (response) {
                    // console.log(response);
                    if (response.status == 1) {
                        swal({
                            title: 'Success!',
                            text: response.message,
                            type: 'success'
                        }, function() {
                            window.location.reload();
                        });
                    }
                    if (response.status == 2) {
                        swal({
                            title: 'Oops!',
                            text: response.message,
                            type: 'error'
                        }, function() {
                            window.location.reload();
                        });
                    }
                },
                error: function (error) {}
            });
        });
    });
});


function checkMobile(value) {
    if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
        $('.mobile').val(value.substring(0, (value.length - 1)));
    } else {
        $('.mobile').val(value);
    }
    
}