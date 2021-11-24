<?php

    include_once("../Includes/db.inc.php");
    $id_article=$_POST["id_article"];
    $title_fr=str_replace("'", "\\'",$_POST['title_fr']);
    $title_ar=$_POST['title_ar'];
    $categories=$_POST['categories'];
    $village=$_POST['village'];
    $Description_fr=str_replace("'", "\\'",$_POST['Description_fr']);
    $Description_ar=str_replace("'", "\\'",$_POST["Description_ar"]);
 
    $Image_article_Name = $_FILES['img_article']['name'];
    $Image_article_Size = $_FILES['img_article']['size'];
    $Image_article_tmpN = $_FILES['img_article']['tmp_name'];
    $image='';
    $dataImg='';
    $Image_article_type = $_FILES['img_article']['type'];
    $Image_article_Allow_Extansion = array("jpeg","png","jpg","gif","PNG","JEPJ","JPG");



    if (is_array($_FILES['img_article']['name']) || is_object($_FILES['img_article']['name']))
    {
        foreach($_FILES['img_article']['name'] as $key=>$val)
        {
            $image=$_FILES['img_article']['name'][$key];
            $Image_article_tmpN=$_FILES['img_article']['tmp_name'][$key];
            $Image_article_Extansion =pathinfo($image,PATHINFO_EXTENSION);
            $image=rand(0,1000) . '_' .$image;
            move_uploaded_file($Image_article_tmpN,'../avatar/'.$image);
            $dataImg .=$image." ";
        }
        if(!in_array($Image_article_Extansion,$Image_article_Allow_Extansion))
        {
            echo "S'il vous plait saisir seulement des image (png | jpg | jpeg | gif)";
        }
        else
        {
            $query="INSERT INTO tb_article(`ID_article`,`Titre_ar`,`Titre_fr`,`ID_category`,`ID_village`,`Image`,`Description_ar`,`Description_fr`) 
            VALUES('$id_article','$title_ar','$title_fr','$categories','$village','$dataImg','$Description_ar','$Description_fr') ON DUPLICATE KEY UPDATE 
            Titre_ar='$title_ar',Titre_fr='$title_fr',ID_category='$categories',ID_village='$village',`image`='$dataImg',Description_ar='$Description_ar',Description_fr='$Description_fr'";
            $result=mysqli_query($conx,$query);
            if($result){
                echo "Ajouté avec success";
            }else{
                echo "L'ajoute de produit a échoué !";
                echo mysqli_error($conx);
            }
        }
    }
