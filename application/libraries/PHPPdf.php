<?php
require_once(dirname(__FILE__).'/tcpdf/tcpdf.php');

class PHPPdf extends TCPDF {
    public function __construct() {
        parent::__construct(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    }
}
