<?php
    $con= mysqli_connect("localhost","root","","online shopping");

    if(mysqli_connect_errno()){
        echo "". mysqli_connect_error();
    }
?>