<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id_articlee=$myData['id'];

    if(!empty($id_articlee))
    {
        $query="DELETE FROM tb_article WHERE ID_article =$id_articlee";
        $result=mysqli_query($conx,$query);
        if($result)
        {
           echo "La supprission avec success";
        }else{
            echo "échec la supprission";
        }
    }else
    {
        header("location:Articles.php");
        exit();
    }

?>