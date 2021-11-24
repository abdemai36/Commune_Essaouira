<?php
    include_once("../Includes/db.inc.php");

    $query="SELECT a.ID_annonce_event,a.Titre_annonce_ar,a.Titre_annonce_fr,c.Titre_categorie_fr,v.Titre_village_fr,a.Description_ar,a.Description_fr,a.image,a.Date_annonce,a.place_ar,a.place_fr,a.is_annonce FROM tb_annonce_event a inner join tb_category c on a.ID_category=c.ID_category inner join tb_village v on a.ID_village=v.ID_village";
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