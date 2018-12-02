
    $(document).ready(function(){
	    $("#btnSubmit").click(function(e){

	        var SID = $("input#SID").val();
	        var Password = $("input#Password").val();
	        var rePassword = $("input#PasswordConfirm").val();
	        var Name = $("input#Name").val();
	        var Gender = $("#Gender").val();
	        var Department = $("#Department").val();
	        var Year = $("#Year").val();
	        var Month = $("#Month").val();
	        var Day = $("#Day").val();
	        var Nickname = $("input#Nickname").val();
	        var Email = $("input#Email").val();
	        var regData = {
	                SID: SID,
	                Password: Password,
	                rePassword: rePassword,
	                Name: Name,
	                Gender: Gender,
	                Department: Department,
	                Year: Year,
	                Month: Month,
	                Day: Day,
	                Nickname: Nickname,
	                Email: Email
	            };
	        $.ajax({
	            url: "../u/register_act.php",
	            type: "POST",
	            dataType: "json",
	            data: regData,
	            success: function(result) {
	                if(result.status == 1)
	                {
		                $("#btnSubmit").attr("disabled", false);
		                $('#result').html("<div class='alert alert-success'>");
		                $('#result > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                    .append("</button>");
		                $('#result > .alert-success')
		                    .append("<strong>" + result.msg + "</strong>");
		                $('#result > .alert-success')
		                    .append('</div>');
		                $('#registerForm').trigger("reset");
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
