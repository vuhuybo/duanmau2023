<?php
    include "modal/pdo.php";
    function themsp(){
        if(isset($_POST['name_sp']) && $_POST['name_sp']){
            $name = $_POST['name_sp'];
            $price = $_POST['gia_sp'];
            $mota = $_POST['description_sp'];
            // $ = $_POST['name_sp'];
            $name = $_POST['name_sp'];
        }
    }