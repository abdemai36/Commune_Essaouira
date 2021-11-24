<?php
    include_once("../Includes/db.inc.php");
    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $ID_jeveux =$myData['id'];

    $query="SELECT * FROM tb_jeveux WHERE ID_jeveux=$ID_jeveux";
    $result=mysqli_query($conx,$query);
    if($result)
    {
        $row=mysqli_fetch_array($result);
    }
    echo json_encode($row);

?>