  </head>
  <body>
    <header class="navbar navbar-inverse navbar-static-top">
      <div class="container">
	<div class="navbar-header">
	  <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand hidden-sm" href="<?php echo base_url(); ?>">VFB Remote</a>
	</div>
	<div class="navbar-collapse collapse" role="navigation">
	  <ul class="nav navbar-nav">
	    <li class="hidden-sm hidden-md"><a href="<?php echo base_url("home"); ?>">首页</a></li>
	    <li><a href="#">电路拓扑</a></li>
	    <li><a href="#">光伏监控</a></li>
	    <li><a href="#">储能监控</a></li>
	    <li role="presentation" class="dropdown">
	      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		储能监控<span class="caret"></span>
	      </a>
	      <ul class="dropdown-menu">
	      	<li><a href="<?php echo base_url('storagemonitor/batteryStatus') ?>">电池状态</a></li>
	      	<li><a href="<?php echo base_url('storagemonitor/batteryOperation') ?>">远程操作</a></li>
	      </ul>
	    </li>
	    <li><a href="#">充电桩</a></li>
	    <li><a href="#">监控调度</a></li>
	    <li><a href="#">功率曲线</a></li>
	    <li><a href="#">数据报表</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right hidden-sm">
        <?php if ($this->session->userdata('is_login')){ ?>
         <li><a href="#"><?php echo $this->session->userdata('username'); ?></a></li>
         <li><a href="<?php echo base_url('user/logout'); ?>">退出</a></li>
        <?php } else { ?>
         <li><a href="<?php echo base_url('user/login'); ?>">登陆</a></li>
        <?php } ?>
	  </ul>
	</div>
      </div>
    </header>
