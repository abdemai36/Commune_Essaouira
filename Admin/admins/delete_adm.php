<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_adm=$myData['id_adm'];

    if(!empty($id_adm))
    {
        $query="DELETE FROM tb_login WHERE ID_user=$id_adm";
        $result=mysqli_query($conx,$query);
        if($result)
        {
            echo "La supprission avec success";
        }else{
            echo "échec la supprission";
        }
    }else
    {
        header("location:Admins.php");
        exit();
    }

?>