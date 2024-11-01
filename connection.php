<?php
    $con= mysqli_connect("localhost","root","","floatywear");
    if(mysqli_connect_errno()){
        die("can't connect to the database".mysqli_connect_errno());
    }
?>