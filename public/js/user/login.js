$(function (){
    // 用户点击键盘上的Enter键，进行登录
    document.onkeydown = function (e) {
        var theEvent = window.event || e;
        var code = theEvent.keyCode || theEvent.which;
        if (code == 13) {
            $("#btn-login").click();
        }
    };

    $('#btn-login').on('click', function() {
        //$('#input-username').blur();
        //$('#input-password').blur();
        var requestObj = new RequestUtil();
        params = {
            'username': $('#input-username').val(),
            'password': $('#input-password').val(),
        };
        requestObj.post('user/validate',params,function(apiRet){
            location.href = apiRet.url;
        });
    });
});
