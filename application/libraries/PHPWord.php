<?php
require_once dirname(__FILE__).'/PHPWord/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

class PHPWord extends \PhpOffice\PhpWord\PhpWord {
}
