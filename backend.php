<?php
require_once("config.php");
class Backend extends Config{
    protected $content = NULL;

    public function __construct(){
        parent::__construct();
    }

    public function views($content = NULL, $data = NULL){

        include("view/_layout/_backend/_header.php");
        include("view/_layout/_backend/_menu.php");
        
        if (@$content != ""){
            include("view/_backend/".$content);
        }

        include("view/_layout/_backend/_footer.php");
    }
}