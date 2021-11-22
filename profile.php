<?php
    include_once("Includes/Navbar.php");
    if(isset($_SESSION['iduser']) && isset($_SESSION['email']) && isset($_SESSION['username']))
    {
        echo $_SESSION['iduser']."<br>";
        echo $_SESSION['username']."<br>";
        echo $_SESSION['email']."<br>";
    }
    else{
        header("location:Seconnecter");
    }
?>