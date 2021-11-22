<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_adm=$myData['id'];

    $query="SELECT * FROM tb_login WHERE ID_user=$id_adm";
    $result=mysqli_query($conx,$query);
    if($result)
    {
        $row=mysqli_fetch_array($result);
    }
    echo json_encode($row);

?>