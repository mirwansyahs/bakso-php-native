<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    const base_url      = "http://localhost/bakso-php-native/";
    const base_name     = "Bakso Yamin Kang Iim";
    const favicon       = "AdminLTELogo.png";

    const hostname   = "localhost";
    const username   = "root";
    const password   = "";
    const database   = "spt_crm";

    class Config{
        public $con;

        function __construct(){
            $this->con = new mysqli(hostname, username, password, database);
            if (!$this->con){
                echo mysqli_error($this->con);
            }
        }

        function swal($title = '', $text = '', $icon = ''){
            $html = "<script>Swal.fire(
                '".$title."',
                '".$text."',
                '".$icon."'
              )</script>";
            echo $html;
        }

        function redirect($url = ''){
            echo "<meta http-equiv='refresh' content='0;".$url."'>";
        }
    }
    
?>