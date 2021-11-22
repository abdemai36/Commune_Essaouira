<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_categorie=$myData['id'];

    if(!empty($id_categorie))
    {
        $query="DELETE FROM tb_category WHERE ID_category=$id_categorie";
        $result=mysqli_query($conx,$query);
        if($result)
        {
           echo "La supprission avec success";
        }else{
            echo "échec la supprission";
        }
    }else
    {
        header("location:Catégories.php");
        exit();
    }

?>