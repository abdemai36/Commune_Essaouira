<?php
    include_once("../Includes/db.inc.php");

    if( isset($_POST["title_jeveux_fr"])){

        // $data=stripslashes(file_get_contents("php://input"));
        // $myData=json_decode($data,true);
        $id_jeveux=$_POST['id_jeveux'];
        $title_fr=str_replace("'", "\\'",$_POST['title_jeveux_fr']);
        $title_ar=str_replace("'", "\\'",$_POST['title_jeveux_ar']);
        $categories=$_POST['categories_jeveux'];
        $Description_fr=$_POST['Description_jeveux_fr'];
        $Description_ar=$_POST['Description_jeveux_ar'];

        //update or insert data
        if(!empty($title_fr) && !empty($title_ar) && !empty($Description_fr) && !empty($Description_ar))
        {
            $query="INSERT INTO tb_jeveux(id_jeveux,Titre_jeveux_ar,Titre_jeveux_fr,Description_fr,Description_ar,cetegorie_fr) 
            VALUES('$id_jeveux','$title_ar','$title_fr','$Description_fr','$Description_ar','$categories') ON DUPLICATE 
            KEY UPDATE Titre_jeveux_ar='$title_fr',Titre_jeveux_fr='$title_ar',Description_fr='$Description_fr',Description_ar='$Description_ar',cetegorie_fr='$categories'";
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
    }else{
        header("location:Je_veuxpage.php");
        exit();
    }
?>