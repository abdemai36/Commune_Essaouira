<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_jeveux=$myData['id'];

    if(!empty($id_jeveux))
    {
        $query="DELETE FROM tb_jeveux WHERE ID_jeveux=$id_jeveux";
        $result=mysqli_query($conx,$query);
        if($result)
        {
           echo "La supprission avec success";
        }else{
            echo "échec la supprission";
        }
    }else
    {
        header("location:Je_veuxpage.php");
        exit();
    }

?>