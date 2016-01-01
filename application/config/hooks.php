<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'] = array(
        'class'    => 'ExceptionHandler',
        'function' => 'setExceptionHandler',
        'filename' => 'ExceptionHandler.php',
        'filepath' => 'hooks'
        );
$hook['post_controller_constructor'] = array(
        'class'    => 'LoginChecker',
        'function' => 'isLogin',
        'filename' => 'LoginChecker.php',
        'filepath' => 'hooks'
        );
$hook['pre_controller'] = array(
        'class'    => 'XHProf',
        'function' => 'start',
        'filename' => 'XHProf.php',
        'filepath' => 'hooks'
        );
$hook['post_controller'] = array(
        'class'    => 'XHProf',
        'function' => 'end',
        'filename' => 'XHProf.php',
        'filepath' => 'hooks'
        );
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
