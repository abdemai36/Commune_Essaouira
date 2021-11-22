<?php
    include_once("../Includes/db.inc.php");

    $query="SELECT * FROM tb_login WHERE GoupeID=1 ORDER BY ID_user asc";
    $result=mysqli_query($conx,$query);
    if($result)
    {
        $data=array();
        while($row=mysqli_fetch_array($result))
        {
            $data[]=$row;
        }
    }else{
        echo mysqli_error($conx);
    }
    echo json_encode($data);

?>