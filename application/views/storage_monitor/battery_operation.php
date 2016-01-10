<?php $this->load->view('head_segment'); ?>
    <link href="<?php echo base_url('public/css/storage_monitor/battery_operation.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/lib/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('public/lib/bootstrap-switch/dist/js/bootstrap-switch.min.js'); ?>"></script>
    <link href="<?php echo base_url('public/lib/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('public/lib/bootstrap-timepicker/js/bootstrap-timepicker.min.js'); ?>"></script>
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
          <input type="checkbox" id="chk-fan" data-on-text="关闭" data-off-text="打开"/>
        </div>
        <div class="col-md-2">
          <label for="btn-operate-fan">泵</label>
          <input type="checkbox" id="chk-pump" data-on-text="关闭" data-off-text="打开"/>
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
                <div class="col-md-2"><input type="radio" name="radio-mode" id="radio-auto-mode">自动模式</input></div>
		<div class="col-md-2">
		  <div class="row">
          	          <input type="checkbox" id="chk-auto-charging" data-on-text="停止充电" data-off-text="开始充电"/>
                  </div>
                </div>
		<div class="col-md-2">
		  <div class="row">
          	          <input type="checkbox" id="chk-auto-discharging" data-on-text="停止放电" data-off-text="开始放电"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-manual-pattern">
            <div class="panel panel-default panel-pattern">
              <div class="panel-body">
                <div class="col-md-2"><input type="radio" name="radio-mode" id="radio-manual-mode">手动模式</input></div>
		<div class="col-md-10">
          <?php for ($i=0;$i<3;$i++) { ?>
		  <div class="row">
	    	    <div class="panel panel-default panel-pattern">
                      <div class="panel-body">
                        <div class="col-md-1"><label>时段<?php echo $i+1;?></label></div>
		        <div class="col-md-3">
                          <label>起始时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-period-<?php echo $i;?>-start-time" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                        </div>
		        <div class="col-md-3">
                          <label>结束时间</label>
		          <div class="input-group bootstrap-timepicker timepicker">
		            <input id="tp-period-<?php echo $i;?>-end-time" type="text" class="form-control input-small">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label>状态</label>
          	              <input type="checkbox" id="chk-period-<?php echo $i;?>-charging" data-on-text="放电" data-off-text="充电"/>
                        </div>
                        <div class="col-md-1">
                          <button type="button" class="btn btn-default" id="btn-period-<?php echo $i;?>-submit">保存</button>
                        </div>
                      </div>
                     </div>
		  </div>
          <?php } ?>
          <div class="row">
            <input type="checkbox" id="chk-manual-running" data-on-text="停止" data-off-text="启动"/>
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
<script src="<?php echo base_url('public/js/storage_monitor/battery_operation.js'); ?>"></script>
<?php $this->load->view('foot_segment'); ?>
