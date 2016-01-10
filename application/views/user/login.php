<?php $this->load->view('head_segment'); ?>
    <link href="<?php echo base_url('public/css/user/login.css'); ?>" rel="stylesheet">
  </head>

  <body>

    <div class="container">

    <div class="form-login">
        <h2 class="form-login-heading">RFB Remote</h2>
        <label for="input-username" class="sr-only">用户名</label>
        <input type="text" id="input-username" class="form-control" placeholder="用户名" required autofocus>
        <label for="input-password" class="sr-only">密码</label>
        <input type="password" id="input-password" class="form-control" placeholder="密码" required>
        <button class="btn btn-lg btn-primary btn-block" id="btn-login">登陆</button>
    </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    <script src="<?php echo base_url('public/js/user/login.js'); ?>"></script>
<?php $this->load->view('foot_segment'); ?>
