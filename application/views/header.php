<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>VFB Remote</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/footer.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('public/bootstrap/js/html5shiv.min.js'); ?>"></script>
      <script src="<?php echo base_url('public/bootstrap/js/respond.min.js'); ?>"></script>
    <![endif]-->
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
	    <li><a href="#">充电桩</a></li>
	    <li><a href="#">监控调度</a></li>
	    <li><a href="#">功率曲线</a></li>
	    <li><a href="#">数据报表</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right hidden-sm">
	    <li><a href="#">登陆</a></li>
	  </ul>
	</div>
      </div>
    </header>
