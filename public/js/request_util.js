function RequestUtil() {
    this.post = function(uri,params,callback){
        $.post(Config.BASE_URI+uri,params,function(apiRet){
            var retObj = $.parseJSON(apiRet);
            if (retObj.status == 0) {
                alert(retObj.status_info.error_msg);
            } else {
                callback(retObj.data);
            }
        });
    };
}
