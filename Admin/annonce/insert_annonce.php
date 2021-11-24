<?php

    include_once("../Includes/db.inc.php");
    $id_annonce=$_POST["id_annonce"];
    $titre_fr=str_replace("'", "\\'",$_POST['titre_fr']);
    $titre_ar=str_replace("'", "\\'",$_POST['titre_ar']);
    $categorie=$_POST['categorie'];
    $village=$_POST['village'];
    $date=$_POST['date_annonce'];
    $rb_isannonce=$_POST['rb_isannonce'];
    $Description_fr=str_replace("'", "\\'",$_POST['Description_fr']);
    $Description_ar=str_replace("'", "\\'",$_POST["Description_ar"]);
    $place_fr=str_replace("'", "\\'",$_POST["place_fr"]);
    $place_ar=str_replace("'", "\\'",$_POST["place_ar"]);
 
    $img_annonce_Name = $_FILES['img_annonce']['name'];
    $img_annonce_Size = $_FILES['img_annonce']['size'];
    $img_annonce_tmpN = $_FILES['img_annonce']['tmp_name'];
    $image='';
    $dataImg='';
    $img_annonce_type = $_FILES['img_annonce']['type'];
    $img_annonce_Allow_Extansion = array("jpeg","png","jpg","gif","PNG","JEPJ","JPG");



    if (is_array($_FILES['img_annonce']['name']) || is_object($_FILES['img_annonce']['name']))
    {
        foreach($_FILES['img_annonce']['name'] as $key=>$val)
        {
            $image=$_FILES['img_annonce']['name'][$key];
            $img_annonce_tmpN=$_FILES['img_annonce']['tmp_name'][$key];
            $img_annonce_Extansion =pathinfo($image,PATHINFO_EXTENSION);
            $image=rand(0,1000) . '_' .$image;
            move_uploaded_file($img_annonce_tmpN,'../avatar/'.$image);
            $dataImg .=$image." ";
        }
        if(!in_array($img_annonce_Extansion,$img_annonce_Allow_Extansion))
        {
            echo "S'il vous plait saisir seulement des image (png | jpg | jpeg | gif)";
        }
        else
        {
            $query="INSERT INTO tb_annonce_event(`ID_annonce_event`,`Titre_annonce_ar`,`Titre_annonce_fr`,`ID_category`,`image`,`Description_ar`,`Description_fr`,`Date_annonce`,`place_ar`,`place_fr`,`ID_village`,`is_annonce`) 
            VALUES('$id_annonce','$titre_ar','$titre_fr','$categorie','$dataImg','$Description_ar','$Description_fr','$date','$place_ar','$place_fr','$village','$rb_isannonce') ON DUPLICATE KEY UPDATE 
            Titre_annonce_ar='$titre_ar',Titre_annonce_fr='$titre_fr',ID_category='$categorie',`image`='$dataImg',Description_ar='$Description_ar',Description_fr='$Description_fr',Date_annonce='$date',place_ar='$place_ar',place_ar='$place_fr',ID_village='$village',is_annonce='$rb_isannonce'";
            $result=mysqli_query($conx,$query);
            if($result){
                echo "Ajouté avec success";
            }else{
                echo "L'ajoute de produit a échoué !";
                echo mysqli_error($conx);
            }
        }
    }
