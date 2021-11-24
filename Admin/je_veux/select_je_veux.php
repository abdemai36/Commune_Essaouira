<?php
    include_once("../Includes/db.inc.php");

    $query="SELECT * FROM tb_jeveux ORDER BY ID_jeveux asc";
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