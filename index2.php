<?php
include_once 'configuracion.php';
class index {
    private $app;
    /**
     * 
     */
    function run(){
        $this->app = new configuracion();
    }
}
$index = new index();
$index->run();


