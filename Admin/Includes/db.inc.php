<?php

    $host="localhost";
    $user="root";
    $password="";
    $db_name="commune_db";

    $conx=mysqli_connect($host,$user,$password,$db_name);

    if(!$conx){
        die("Connection field".mysqli_connect_errno());
        exit();
    }