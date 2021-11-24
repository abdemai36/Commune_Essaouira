<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_annonce=$myData['id'];

    if(!empty($id_annonce))
    {
        $query="DELETE FROM tb_annonce_event WHERE ID_annonce_event =$id_annonce";
        $result=mysqli_query($conx,$query);
        if($result)
        {
           echo "La supprission avec success";
        }else{
            echo "échec la supprission";
        }
    }else
    {
        header("location:Annoncespage.php");
        exit();
    }

?>