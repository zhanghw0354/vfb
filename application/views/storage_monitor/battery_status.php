<?php $this->load->view('head_segment'); ?>
<style type="text/css">
span {
    font-weight: bold;
}
</style>
<?php $this->load->view('header'); ?>
<div class="container">
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">电池状态</h3>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-2">
              <label for="sel-frequency">刷新频率：</label>
            </div>
            <div class="col-md-2">
              <select class="form-control" id="sel-frequency">
                 <option value="-1">不刷新</option>
                 <option value="5">5秒</option>
                 <option value="10">10秒</option>
                 <option value="20">20秒</option>
              </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
              <label for="span-a">电流：</label>
              <span id="span-a">800毫安<span>
            </div>
            <div class="col-md-6">
              <label for="span-v">电压：</label>
              <span id="span-v">36伏<span>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-12">
                <table class="table">
                   <thead>
                      <tr>
                         <th>&nbsp;</th>
                         <th>温度(度)</th>
                         <th>压力(兆帕)</th>
                         <th>液位(厘米)</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr class="active">
                         <td><span class="label label-danger">正极</span></td>
                         <td>25°C</td>
                         <td>10MPa</td>
                         <td>50CM</td>
                      </tr>
                      <tr class="warning">
                         <td><span class="label label-primary">负极</span></td>
                         <td>40°C</td>
                         <td>11MPa</td>
                         <td>60CM</td>
                      </tr>
                   </tbody>
                </table>
            </div>
        </div>
        
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">统计量</h3>
      </div>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-6">
              <label for="span-t">累计运行时间：</label>
              <span id="span-t">4天5小时6分7秒<span>
            </div>
            <div class="col-md-6">
              <label for="span-ij">累计充电电能：</label>
              <span id="span-ij">20kW·h<span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
              <label for="span-oj">累计放电电能：</label>
              <span id="span-oj">18kW·h<span>
            </div>
            <div class="col-md-6">
              <label for="span-e">循环效率：</label>
              <span id="span-e">90%<span>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('public/js/storage_monitor/battery_operation.js'); ?>"></script>
<?php $this->load->view('foot_segment'); ?>
