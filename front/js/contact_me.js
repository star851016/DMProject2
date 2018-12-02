$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
        },
        submitSuccess: function($form, event) {
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            var action = $("input#action").val();
            var uid = $("input#uid").val();
            var name = $("input#name").val();
            var gender = $('input[name=gender]:checked').val();
            var nickname = $("input#nickname").val();
            $.ajax({
                url: "../u/uedit.php",
                type: "GET",
                data: {
                    action: action,
                    uid: uid,
                    name: name,
                    gender: gender,
                    nickname: nickname
                },
                cache: false,
                success: function() {
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>編輯完成!</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$('#name').focus(function() {
    $('#success').html('');
});
