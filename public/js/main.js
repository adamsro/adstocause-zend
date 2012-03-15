/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {


    $("#point-form").submit(function(event) {
        event.preventDefault();
        // Assign handlers immediately after making the request,
        // and remember the jqxhr object for this request
        $.post("/watch/addpoint", $("#point-form").serialize(), function(data) {
            if(data == 1) {
                $("#point-submit").attr('disabled', true);
                window.location.reload();
            } else {
                //   $("#point-submit").attr('disabled', true);
                alert("form already submitted!");
                window.location.reload();
            //    $("#point-form-error").html("Form already submitted!");
            }

        }).error(function() {
            $("#point-form-error").html("Ajax error!");
            alert('Ajax error!');

        }).complete(function() {
            });
    });
    if( $("#point-submit").length > 0) {
        next_button();
    }
    /* donate-form */
    $(".donate-form").submit(function(event) {
        event.preventDefault();
        // Assign handlers immediately after making the request,
        // and remember the jqxhr object for this request
        $.post("/watch/donate", $(this).serialize(), function(data) {
            if(data == 1) {
                $(this).attr('disabled', true);
                window.location.reload();
            } else {
                $(this).attr('disabled', true);
                alert("form already submitted!");
                window.location.reload();
            }

        }).error(function() {
            alert('Ajax error!');

        }).complete(function() {
            });
    });
});

function next_button () {
    $("#point-submit").attr('value', 'Wait...');
    $("#point-submit").attr('disabled', true);
    setTimeout( function() {
        $("#point-submit").attr('value', 'Next');
        $("#point-submit").attr('disabled', false);
    }, 6 * 1000);
}