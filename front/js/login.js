
    $(document).ready(function(){
        $("#btnLogin").click(function(e){
            var loginData = {
                    SID: $("input#SID").val(),
                    Password: $("input#Password").val()
                };
            $.ajax({
                url: "../u/login_act.php",
                type: "POST",
                dataType: "json",
                data: loginData,
                success: function(result) {
                    if(result.status)
                    {
                    $("#btnSubmit").attr("disabled", false);
                    $('#result').html("<div class='alert alert-success'>");
                    $('#result > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#result > .alert-success')
                        .append("<strong>" + result.msg + "</strong>");
                    $('#result > .alert-success')
                        .append('</div>');
                    $('#loginForm').trigger("reset");
                    window.open('../c/course_list.php', '_self');
                    }
                    else
                    {
                        $('#result').html("<div class='alert alert-danger'>");
                        $('#result > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#result > .alert-danger').append("<strong>" + result.msg + "</strong>");
                        $('#result > .alert-danger').append('</div>'); 
                    }
                },
                error: function() {
                    $('#result').html("<div class='alert alert-danger'>");
                    $('#result > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#result > .alert-danger').append("<strong>似乎發生了一些錯誤，請稍後再試。</strong>");
                    $('#result > .alert-danger').append('</div>');
                },
            });
        });
    });
