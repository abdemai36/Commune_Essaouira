<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_village=$myData['id'];

    if(!empty($id_village))
    {
        $query="DELETE FROM tb_village WHERE ID_village=$id_village";
        $result=mysqli_query($conx,$query);
        if($result)
        {
           echo "La supprission avec success";
        }else{
            echo "échec la supprission";
        }
    }else
    {
        header("location:Villages.php");
        exit();
    }

?>