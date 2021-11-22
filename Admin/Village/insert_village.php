<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id=$myData['id'];
    $village_fr=$myData['village_fr'];
    $village_ar=$myData['village_ar'];
    
    //update or insert data
    if(!empty($village_fr) && !empty($village_ar))
    {
        
        $query="INSERT INTO tb_village(ID_village,Titre_ar ,Titre_fr) 
        VALUES('$id','$village_ar','$village_fr') ON DUPLICATE 
        KEY UPDATE Titre_fr='$village_fr',Titre_ar='$village_ar'";
        $result=mysqli_query($conx,$query);
        if($result)
        {
            echo "L'ajoute avec success";
        }else{
            echo "échec de l'ajout (Erreur en niveau de data base)";
        }
              
    }else
    {
        echo "Saisir tous les informations";
    }
?>