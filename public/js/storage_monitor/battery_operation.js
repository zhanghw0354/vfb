$(function(){
    InitOperationView();
});
function InitOperationView() {
    var requestObj = new RequestUtil();
    requestObj.post('batteryoperation/getOperationInfo','',function(apiRet){
        $("#chk-fan").bootstrapSwitch('state',apiRet.is_fan_running);
        $("#chk-pump").bootstrapSwitch('state',apiRet.is_pump_running);
        $("#radio-auto-mode").attr('checked',apiRet.is_auto_mode == 1);
        $("#chk-auto-charging").bootstrapSwitch('state',apiRet.auto_mode_is_charging);
        $("#chk-auto-discharging").bootstrapSwitch('state',apiRet.auto_mode_is_discharging);

        periodCount = apiRet.periods.length;
        for (var i = 0; i < periodCount; i++) {
            $('#chk-period-'+i+'-charging').bootstrapSwitch('state',apiRet.periods[i].is_charging);
            timepickerOptions = {
                maxHours: 23,
                minuteStep: 1,
                showMeridian: false,
                /*
                icons: {
                    up: 'glyphicon glyphicon-chevron-up',
                    down: 'glyphicon glyphicon-chevron-down'
                },
                */
                appendWidgetTo: 'body'
            };
            $('#tp-period-'+i+'-start-time').timepicker(timepickerOptions);
            $('#tp-period-'+i+'-end-time').timepicker(timepickerOptions);
            $('#tp-period-'+i+'-start-time').timepicker('setTime',apiRet.periods[i].start_time);
            $('#tp-period-'+i+'-end-time').timepicker('setTime',apiRet.periods[i].end_time);
            $('#btn-period-'+i+'-submit').attr('disabled','disabled');
        }

        $("#chk-manual-running").bootstrapSwitch('state',apiRet.manual_mode_is_running);
    });
}
