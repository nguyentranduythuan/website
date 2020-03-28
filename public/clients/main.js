
function showLoading()
{
    $('#popup_loading').modal('show');
}

function hideLoading()
{
    $('#popup_loading').modal('hide');
}

function showAlert(msg)
{
    if(msg == "")
    {
        msg = "Lỗi từ hệ thống.<br/>Vui lòng thử lại";
    }
    $('#popup_message_msg').html(msg);
    $('#popup_message').modal('show');
}