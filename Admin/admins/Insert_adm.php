<?php
    include_once("../Includes/db.inc.php");

    $data=stripslashes(file_get_contents("php://input"));
    $myData=json_decode($data,true);
    $id=$myData['id'];
    $f_name=$myData['f_name'];
    $l_name=$myData['l_name'];
    $email=$myData['email'];
    $pwd=$myData['pwd'];

    //update or insert data
    if(!empty($f_name) && !empty($l_name) && !empty($pwd) && !empty($email))
    {
        $query="SELECT * FROM tb_login WHERE Email_user=$email";
        $result=mysqli_query($conx,$query);
        if($result)
        {
            echo "échec de l'ajout (Nom d'utilisateur ou email déjà existe ! )";
            
        }else{
            $hash_password=password_hash($pwd,PASSWORD_DEFAULT);
            $query="INSERT INTO tb_login(ID_user,F_name_user,L_name_user,Email_user,Pwd_user,GoupeID) 
            VALUES('$id','$f_name','$l_name','$email','$hash_password',1) ON DUPLICATE 
            KEY UPDATE F_name_user='$f_name',L_name_user='$l_name',Email_user='$email',Pwd_user='$hash_password',GoupeID=1";
            $result=mysqli_query($conx,$query);
            if($result)
            {
                echo "L'ajoute avec success";
            }else{
                echo "échec de l'ajout (Nom d'utilisateur ou email déjà existe ! )";
            }
        }       
    }else
    {
        echo "Saisir tous les informations";
    }
?>