<?php
    include_once("../Includes/db.inc.php");

    $query="SELECT * FROM tb_category ORDER BY ID_category asc";
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