jQuery(document).ready(function($) {

    $('#login_form').on('submit', function(e) {
        var form_id = $(this).attr('id');

        var err_message = '';
        var errors = [];

        var email_elem = $('#'+form_id+' [name="email"]');
        var password_elem = $('#'+form_id+' [name="password"]');

        if ( validate_empty(  email_elem ) ) {
            if ( ! validate_email( email_elem ) ) {
                err_message = 'Invalid email address.';
                errors.push(err_message);
            }
        } else {
            err_message = 'The email field is empty.';
            errors.push(err_message);
        }
        if ( ! validate_empty( password_elem ) ) {
            err_message = 'The password field is empty.';
            errors.push(err_message);
        }

        var errors_count = $('#'+form_id+' .has-error').length;
        if ( errors_count > 0 ) {
            $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger').slideDown();
            printErrorMsg(errors, '#'+form_id);
            return false;
        }

        $('#'+form_id+' p.status')
            .text(ajax_auth_object.loading_message)
            .removeClass('alert-danger alert-success')
            .addClass('alert-info')
            .slideDown();
        set_disabled_form(form_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action': 'ajaxlogin',
                'email': email_elem.val(),
                'password': password_elem.val(),
                'remember': $('#'+form_id+' [name="remember"]').prop('checked') == true,
                'referer': $('#'+form_id+' [name="_wp_http_referer"]').val(),
                'auth-nonce': $('#'+form_id+' [name="auth-nonce"]').val()
            },
            success: function(data){
                unset_disabled_form(form_id);
                if (data.status == true){
                    $('#'+form_id+' p.status').removeClass('alert-info alert-danger').addClass('alert-success');
                    $('#'+form_id+' p.status').text(data.message);
                    document.location.href = data.referer;
                } else {
                    $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger');
                    printErrorMsg(data.errors, '#'+form_id);
                }
            }
        });
        e.preventDefault();
    });

    $('#forgot').on('submit', function(e) {
        var form_id = $(this).attr('id');

        var err_message = '';
        var errors = [];

        var email_elem = $('#'+form_id+' [name="email"]');

        if ( validate_empty(  email_elem ) ) {
            if ( ! validate_email( email_elem ) ) {
                err_message = 'Invalid email address.';
                errors.push(err_message);
            }
        } else {
            err_message = 'The email field is empty.';
            errors.push(err_message);
        }

        var errors_count = $('#'+form_id+' .has-error').length;
        if ( errors_count > 0 ) {
            $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger').slideDown();
            printErrorMsg(errors, '#'+form_id);
            return false;
        }

        $('#'+form_id+' p.status')
            .text(ajax_auth_object.loading_message)
            .removeClass('alert-danger alert-success')
            .addClass('alert-info')
            .slideDown();
        set_disabled_form(form_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action':       'ajaxforgot',
                'email':        email_elem.val(),
                'referer':      $('#'+form_id+' [name="_wp_http_referer"]').val(),
                'auth-nonce':   $('#'+form_id+' [name="auth-nonce"]').val()
            },
            success: function(data){
                unset_disabled_form(form_id);
                if (data.status == true){
                    $('#'+form_id+' p.status').removeClass('alert-info alert-danger').addClass('alert-success');
                    $('#'+form_id+' p.status').text(data.message);
                    document.location.href = data.referer;
                } else {
                    $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger');
                    printErrorMsg(data.errors, '#'+form_id);
                }
            }
        });
        e.preventDefault();
    });

    $('#join').on('submit', function(e) {
        var form_id = $(this).attr('id');

        var err_message = '';
        var errors = [];

        var first_name_elem = $('#'+form_id+' [name="first_name"]');
        var last_name_elem = $('#'+form_id+' [name="last_name"]');
        var email_elem = $('#'+form_id+' [name="email"]');
        var password_elem = $('#'+form_id+' [name="password"]');
        var confirm_password_elem = $('#'+form_id+' [name="confirm_password"]');

        if ( ! validate_empty( first_name_elem ) ) {
            err_message = 'The first name field is empty.';
            errors.push(err_message);
        }
        if ( ! validate_empty( last_name_elem ) ) {
            err_message = 'The last name field is empty.';
            errors.push(err_message);
        }
        if ( validate_empty(  email_elem ) ) {
            if ( ! validate_email( email_elem ) ) {
                err_message = 'Invalid email address.';
                errors.push(err_message);
            }
        } else {
            err_message = 'The email field is empty.';
            errors.push(err_message);
        }
        var password_elem_validate = true;
        if ( ! validate_empty( password_elem ) ) {
            password_elem_validate = false;
            err_message = 'The password field is empty.';
            errors.push(err_message);
        } else {
            if ( ! validate_length( password_elem, 5, 15 ) ) {
                password_elem_validate = false;
                err_message = 'Password must be 5 to 15 characters in length.';
                errors.push(err_message);
            }
        }
        var confirm_password_elem_validate = true;
        if ( ! validate_empty( confirm_password_elem ) ) {
            confirm_password_elem_validate = false;
            err_message = 'The confirm password field is empty.';
            errors.push(err_message);
        } else {
            if ( ! validate_length( confirm_password_elem, 5, 15 ) ) {
                confirm_password_elem_validate = false;
                err_message = 'Confirm password must be 5 to 15 characters in length.';
                errors.push(err_message);
            }
        }
        if ( password_elem_validate && confirm_password_elem_validate ) {
            if ( ! validate_passwords_match( password_elem, confirm_password_elem ) ) {
                err_message = 'Passwords mismatch.';
                errors.push(err_message);
            }
        }

        var errors_count = $('#'+form_id+' .has-error').length;
        if ( errors_count > 0 ) {
            $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger').slideDown();
            printErrorMsg(errors, '#'+form_id);
            return false;
        }

        $('#'+form_id+' p.status')
            .text(ajax_auth_object.loading_message)
            .removeClass('alert-danger alert-success')
            .addClass('alert-info')
            .slideDown();
        set_disabled_form(form_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action': 'ajaxjoin',
                'first_name': first_name_elem.val(),
                'last_name': last_name_elem.val(),
                'email': email_elem.val(),
                'password': password_elem.val(),
                'confirm_password': confirm_password_elem.val(),
                'have_code': $('#'+form_id+' [name="have_code"]').prop('checked') == true,
                'auth-nonce': $('#'+form_id+' [name="auth-nonce"]').val()
            },
            success: function(data){
                unset_disabled_form(form_id);
                if (data.status == true){
                    $('#'+form_id+' p.status').text(data.message);
                    $('#'+form_id+' p.status').removeClass('alert-info alert-danger').addClass('alert-success');
                    jQuery('#joinNow').modal("hide");
                    jQuery('#joinowVerification .email-btn a').text(data.email);
                    jQuery('#joinowVerification [name="email"]').val(data.email);
                    jQuery('#joinowVerification').modal("show");
                    $('[data-target="#joinNow"]').attr('data-target', '#joinowVerification');
                } else {
                    $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger');
                    printErrorMsg(data.errors, '#'+form_id);
                }
            }
        });
        e.preventDefault();
    });

    $('#joinowVerificationForm').on('submit', function(e) {
        var form_id = $(this).attr('id');
        var join_form_id = 'join';

        var err_message = '';
        var errors = [];

        var first_name_elem = $('#'+join_form_id+' [name="first_name"]');
        var last_name_elem = $('#'+join_form_id+' [name="last_name"]');
        var email_elem = $('#'+join_form_id+' [name="email"]');
        var password_elem = $('#'+join_form_id+' [name="password"]');
        var confirm_password_elem = $('#'+join_form_id+' [name="confirm_password"]');
        var code_elem = $('#'+form_id+' [name="code"]');

        if ( ! validate_empty( first_name_elem ) ) {
            err_message = 'The first name field is empty.';
            errors.push(err_message);
        }
        if ( ! validate_empty( last_name_elem ) ) {
            err_message = 'The last name field is empty.';
            errors.push(err_message);
        }
        if ( validate_empty(  email_elem ) ) {
            if ( ! validate_email( email_elem ) ) {
                err_message = 'Invalid email address.';
                errors.push(err_message);
            }
        } else {
            err_message = 'The email field is empty.';
            errors.push(err_message);
        }
        var password_elem_validate = true;
        if ( ! validate_empty( password_elem ) ) {
            password_elem_validate = false;
            err_message = 'The password field is empty.';
            errors.push(err_message);
        } else {
            if ( ! validate_length( password_elem, 5, 15 ) ) {
                password_elem_validate = false;
                err_message = 'Password must be 5 to 15 characters in length.';
                errors.push(err_message);
            }
        }
        var confirm_password_elem_validate = true;
        if ( ! validate_empty( confirm_password_elem ) ) {
            confirm_password_elem_validate = false;
            err_message = 'The confirm password field is empty.';
            errors.push(err_message);
        } else {
            if ( ! validate_length( confirm_password_elem, 5, 15 ) ) {
                confirm_password_elem_validate = false;
                err_message = 'Confirm password must be 5 to 15 characters in length.';
                errors.push(err_message);
            }
        }
        if ( password_elem_validate && confirm_password_elem_validate ) {
            if ( ! validate_passwords_match( password_elem, confirm_password_elem ) ) {
                err_message = 'Passwords mismatch.';
                errors.push(err_message);
            }
        }
        if ( ! validate_empty( code_elem ) ) {
            err_message = 'The verification code field is empty.';
            errors.push(err_message);
        }

        var errors_count = $('#'+form_id+' .has-error').length + $('#'+join_form_id+' .has-error').length;
        if ( errors_count > 0 ) {
            $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger').slideDown();
            printErrorMsg(errors, '#'+form_id);
            return false;
        }

        $('#'+form_id+' p.status')
            .text(ajax_auth_object.loading_message)
            .removeClass('alert-danger alert-success')
            .addClass('alert-info')
            .slideDown();
        set_disabled_form(form_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action': 'ajaxjoinverification',
                'first_name': first_name_elem.val(),
                'last_name': last_name_elem.val(),
                'email': email_elem.val(),
                'password': password_elem.val(),
                'confirm_password': confirm_password_elem.val(),
                'code': code_elem.val(),
                'auth-nonce':  $('#'+form_id+' [name="auth-nonce"]').val()
            },
            success: function(data){
                unset_disabled_form(form_id);
                if (data.status == true){
                    $('#'+form_id+' p.status').text(data.message);
                    $('#'+form_id+' p.status').removeClass('alert-info alert-danger').addClass('alert-success');
                    jQuery('#joinowVerification').modal("hide");
                    jQuery('#joinowSuccess').modal("show");
                    $('[data-target="#joinNow"]').attr('data-target', '#joinowSuccess');
                    $('[data-target="#joinowVerification"]').attr('data-target', '#joinowSuccess');
                } else {
                    $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger');
                    printErrorMsg(data.errors, '#'+form_id);
                }
            }
        });
        e.preventDefault();
    });

    $('#resend_confirmation').on('click', function(e) {
        var form_id = $(this).parents('.modal').attr('id');
        var join_form_id = 'join';

        var email_elem = $('#'+join_form_id+' [name="email"]');

        if ( validate_empty(  email_elem ) ) {
            if ( ! validate_email( email_elem ) ) {
                err_message = 'Invalid email address.';
                errors.push(err_message);
            }
        } else {
            err_message = 'The email field is empty.';
            errors.push(err_message);
        }

        var errors_count = $('#'+join_form_id+' .has-error').length;
        if ( errors_count > 0 ) {
            $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger').slideDown();
            printErrorMsg(errors, '#'+form_id);
            return false;
        }

        $(this).parent().fadeOut().remove();
        $('#'+form_id+' p.status')
            .text(ajax_auth_object.loading_message)
            .removeClass('alert-danger alert-success')
            .addClass('alert-info')
            .slideDown();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action': 'ajaxresendconfirmation',
                'email': email_elem.val(),
                'auth-nonce': $('#'+form_id+' [name="auth-nonce"]').val()
            },
            success: function(data){
                if (data.status == true){
                    $('#'+form_id+' p.status').text(data.message);
                    $('#'+form_id+' p.status').removeClass('alert-info alert-danger').addClass('alert-success');
                } else {
                    $('#'+form_id+' p.status').removeClass('alert-info alert-success').addClass('alert-danger');
                    printErrorMsg(data.errors, '#'+form_id);
                }
            }
        });
        e.preventDefault();
    });

});

function set_disabled_form(form_id) {
    $('#' + form_id + ' input, form#' + form_id + ' button')
        .attr({'disabled': true, 'readonly': true});
}

function unset_disabled_form(form_id) {
    $('#' + form_id + ' input, form#' + form_id + ' button')
        .removeAttr('disabled readonly');
}

function printErrorMsg (msg, id) {
    $(id + " p.status").html('');
    $.each( msg, function( key, value ) {
        $(id + " p.status").append('<div class="alert-danger">'+value+'</li>');
    });
}

function validate_empty( elem ) {
    var result = true;
    var val = elem.val();
    var wrap = elem.parents('.form-group');
    if ( ! val ) {
        wrap.addClass('has-error');
        result = false;
    } else {
        wrap.removeClass('has-error');
    }
    return result;
}

function validate_email( elem ) {
    var result = true;
    var val = elem.val();
    var wrap = elem.parents('.form-group');
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if ( ! testEmail.test( val ) ) {
        wrap.addClass('has-error');
        result = false;
    } else {
        wrap.removeClass('has-error');
    }
    return result;
}

function validate_passwords_match( password_elem, confirm_password_elem ) {
    var result = true;
    var val = password_elem.val();
    var val2 = confirm_password_elem.val();
    var wrap = password_elem.parents('.form-group');
    var wrap2 = confirm_password_elem.parents('.form-group');
    if ( val != val2 ) {
        wrap2.addClass('has-error');
        result = false;
    } else {
        wrap2.removeClass('has-error');
    }
    return result;
}

function validate_length( elem, min, max ) {
    var result = true;
    var val = elem.val();
    var val_length = val.length;
    var wrap = elem.parents('.form-group');
    if ( val_length < min || val_length > max ) {
        wrap.addClass('has-error');
        result = false;
    } else {
        wrap.removeClass('has-error');
    }
    return result;
}
