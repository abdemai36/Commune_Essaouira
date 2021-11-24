<?php
    include_once("../Includes/db.inc.php");

    $query="SELECT a.ID_article,a.Titre_ar,a.Titre_fr,c.Titre_categorie_fr,v.Titre_village_fr,a.Description_ar,a.Description_fr,a.Image,a.Date FROM tb_article a inner join tb_category c on a.ID_category=c.ID_category inner join tb_village v on a.ID_village=v.ID_village";
    $result=mysqli_query($conx,$query);
    if($result)
    {
        $data=array();
        while($row=mysqli_fetch_array($result))
        {
            $data[]=$row;
        }
    }
    echo json_encode($data);

?>