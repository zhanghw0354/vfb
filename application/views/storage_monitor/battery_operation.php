<?php $this->load->view('head_segment'); ?>
    <link href="<?php echo base_url('public/css/storage_monitor/battery_operation.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/lib/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('public/lib/bootstrap-switch/dist/js/bootstrap-switch.min.js'); ?>"></script>
    <link href="<?php echo base_url('public/lib/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('public/lib/bootstrap-timepicker//js/bootstrap-timepicker.min.js'); ?>"></script>
<?php $this->load->view('header'); ?>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">风扇和泵</h3>
      </div>
      <div class="panel-body">
        <div class="col-md-2">
          <label for="btn-operate-fan">风扇</label>
          <input type="checkbox" name="my-checkbox" data-on-text="关闭" data-off-text="打开" checked/>
          <script type="text/javascript">
	  	$("[name='my-checkbox']").bootstrapSwitch();
          </script>
        </div>
        <div class="col-md-2">
          <label for="btn-operate-fan">泵</label>
          <input type="checkbox" name="my-checkbox" data-on-text="关闭" data-off-text="打开" checked/>
          <script type="text/javascript">
	  	$("[name='my-checkbox']").bootstrapSwitch();
          </script>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">操作模式</h3>
      </div>
      <div class="panel-body">
          <div class="row">
            <div class="panel panel-default panel-pattern pannel-auto-pattern">
              <div class="panel-body">
                <div class="col-md-2"><input type="checkbox" checked>自动模式</input></div>
		<div class="col-md-2">
		  <div class="row">
          	          <input type="checkbox" name="my-checkbox" data-on-text="停止充电" data-off-text="开始充电" checked/>
                          <script type="text/javascript">
                          	$("[name='my-checkbox']").bootstrapSwitch();
                          </script>
                  </div>
                </div>
		<div class="col-md-2">
		  <div class="row">
          	          <input type="checkbox" name="my-checkbox" data-on-text="停止放电" data-off-text="开始放电" checked/>
                          <script type="text/javascript">
                          	$("[name='my-checkbox']").bootstrapSwitch();
                          </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-manual-pattern">
            <div class="panel panel-default panel-pattern">
              <div class="panel-body">
                <div class="col-md-2"><input type="checkbox">手动模式</input></div>
		<div class="col-md-10">
		  <div class="row">
	    	    <div class="panel panel-default panel-pattern">
                      <div class="panel-body">
                        <div class="col-md-1"><label>时段1</label></div>
		        <div class="col-md-3">
                          <label>起始时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-start-time-1" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                          <script type="text/javascript">
                              $('#tp-start-time-1').timepicker();
                          </script>
                        </div>
		        <div class="col-md-3">
                          <label>结束时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-end-time-1" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                          <script type="text/javascript">
                              $('#tp-end-time-1').timepicker();
                          </script>
                        </div>
                        <div class="col-md-2">
                          <label>状态</label>
          	          <input type="checkbox" name="my-checkbox" data-on-text="放电" data-off-text="充电" checked/>
                          <script type="text/javascript">
		              $("[name='my-checkbox']").bootstrapSwitch();
                          </script>
                        </div>
                      </div>
                     </div>
		  </div>
		  <div class="row">
	    	    <div class="panel panel-default panel-pattern">
                      <div class="panel-body">
                        <div class="col-md-1"><label>时段2</label></div>
		        <div class="col-md-3">
                          <label>起始时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-start-time-2" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                          <script type="text/javascript">
                              $('#tp-start-time-2').timepicker();
                          </script>
                        </div>
		        <div class="col-md-3">
                          <label>结束时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-end-time-2" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                          <script type="text/javascript">
                              $('#tp-end-time-2').timepicker();
                          </script>
                        </div>
                        <div class="col-md-2">
                          <label>状态</label>
          	          <input type="checkbox" name="my-checkbox" data-on-text="放电" data-off-text="充电" checked/>
                          <script type="text/javascript">
		              $("[name='my-checkbox']").bootstrapSwitch();
                          </script>
                        </div>
                      </div>
                     </div>
		  </div>
		  <div class="row">
	    	    <div class="panel panel-default panel-pattern">
                      <div class="panel-body">
                        <div class="col-md-1"><label>时段3</label></div>
		        <div class="col-md-3">
                          <label>起始时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-start-time-3" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                          <script type="text/javascript">
                              $('#tp-start-time-3').timepicker();
                          </script>
                        </div>
		        <div class="col-md-3">
                          <label>结束时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-end-time-3" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                          <script type="text/javascript">
                              $('#tp-end-time-3').timepicker();
                          </script>
                        </div>
                        <div class="col-md-2">
                          <label>状态</label>
          	          <input type="checkbox" name="my-checkbox" data-on-text="放电" data-off-text="充电" checked/>
                          <script type="text/javascript">
		              $("[name='my-checkbox']").bootstrapSwitch();
                          </script>
                        </div>
                      </div>
                     </div>
		  </div>
                  <div class="row">
		    <button type="button" class="btn btn-success" id="btn-auto-charge">启动</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>
