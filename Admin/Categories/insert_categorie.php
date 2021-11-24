<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id=$myData['id'];
    $category_fr=$myData['category_fr'];
    $category_ar=$myData['category_ar'];
    

    //update or insert data
    if(!empty($category_fr) && !empty($category_ar))
    {
        
        $query="INSERT INTO tb_category(ID_category,Titre_categorie_ar ,Titre_categorie_fr) 
        VALUES('$id','$category_ar','$category_fr') ON DUPLICATE 
        KEY UPDATE Titre_categorie_fr='$category_fr',Titre_categorie_ar='$category_ar'";
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