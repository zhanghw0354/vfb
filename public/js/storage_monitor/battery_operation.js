$(function(){
    InitOperationView();
});
function InitOperationView() {
    var requestObj = new RequestUtil();
    requestObj.post('batteryoperation/getOperationInfo','',function(apiRet){
        $("#chk-fan").bootstrapSwitch('state',apiRet.is_fan_running);
        $("#chk-pump").bootstrapSwitch('state',apiRet.is_pump_running);
        $("#radio-auto-mode").attr('checked',apiRet.is_auto_mode == 1);
        $("#radio-manual-mode").attr('checked',apiRet.is_auto_mode == 0);
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
        DisableModeElements();
        $("input[name='radio-mode']").change(DisableModeElements);
        $(".chk-submit-operation").bootstrapSwitch('onSwitchChange',SubmitOperations);
        $(".btn-manual-submit").on('click',SubmitOperations);
    });
}
function DisableModeElements() {
    selectedId = $("input[name='radio-mode']:checked").attr('id');
    if (selectedId == 'radio-auto-mode') {
        $('#chk-auto-charging').bootstrapSwitch('disabled', false);
        $('#chk-auto-discharging').bootstrapSwitch('disabled', false);

        $('.tp-manual-time').attr('disabled','disabled');
        $('.chk-manual-period-charging').bootstrapSwitch('disabled', true);
        $('.btn-manual-submit').attr('disabled','disabled');
        $('#chk-manual-running').bootstrapSwitch('disabled', true);
    } else {
        $('#chk-auto-charging').bootstrapSwitch('disabled', true);
        $('#chk-auto-discharging').bootstrapSwitch('disabled', true);

        $('.tp-manual-time').removeAttr('disabled');
        $('.chk-manual-period-charging').bootstrapSwitch('disabled', false);
        $('.btn-manual-submit').attr('disabled','disabled');
        $('#chk-manual-running').bootstrapSwitch('disabled', false);
    }
}
function SubmitOperations(event) {
    targetId = event.target.id;
    target = $('#'+targetId);
    switch(targetId) {
        case 'chk-fan':
            params = {
                'is_fan_running' : target.bootstrapSwitch('state') ? 1 : 0
            };
            break;
        case 'chk-pump':
            params = {
                'is_pump_running' : target.bootstrapSwitch('state') ? 1 : 0
            };
            break;
        case 'chk-auto-charging':
            params = {
                'is_auto_mode' : 1,
                'auto_mode_is_charging' : target.bootstrapSwitch('state') ? 1 : 0
            };
            break;
        case 'chk-auto-discharging':
            params = {
                'is_auto_mode' : 1,
                'auto_mode_is_discharging' : target.bootstrapSwitch('state') ? 1 : 0
            };
            break;
        case 'chk-manual-running':
            params = {
                'is_auto_mode' : 0,
                'manual_mode_is_running' : target.bootstrapSwitch('state') ? 1 : 0
            };
            break;
        default:
            alert('参数错误');
            return;
    }
    var requestObj = new RequestUtil();
    requestObj.post('batteryoperation/setOperationInfo','',function(apiRet){
        alert('操作成功');
    });
}
