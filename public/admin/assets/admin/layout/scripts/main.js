$(document).ready(function(){
	console.log("READY");
	
});

function onLoginSubmit(form)
{
	console.log("onLoginSubmit");
	$("#btn_login").hide();

	var form = $( '.login-form' );
    var formData = new FormData(form[0]);
    formData.append("submit", "submit");
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json',
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        mimeType:"multipart/form-data",
        success: function (returndata) {
          
            if(returndata && returndata.status)
            {
                $('.alert-danger', $('.login-form')).hide();

                setTimeout(function(){ location.reload(); }, 1000);
            }
            else
            {
                $('.alert-danger', $('.login-form')).show();
                $("#btn_login").show();
            }
        },
        error: function(){
            $("#btn_login").show();
            $('.alert-danger', $('.login-form')).show();
        }
    });

	return false;
}