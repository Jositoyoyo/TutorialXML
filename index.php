<?php
include_once 'configuracion.php';
abstract class index {
    /**
     * A este tipo de relacion se le llama depencia
     */
    static function run(){
        $configuracion = new configuracion();
    }
}
index::run();


