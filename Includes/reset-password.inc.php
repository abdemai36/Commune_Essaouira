<?php

    include_once("../Admin/Includes/db.inc.php");

    if(isset($_POST["reset-password-submit"])){
        $selector=$_POST["selector"];
        $validator=$_POST["validator"];
        $new_pwd=$_POST["new-pwr"];
        $new_pwd_reset=$_POST["new-pwd-repeat"];

        if(empty($new_pwd) || empty($new_pwd_reset)){
            header("location:../create-new-password?new-pwd=empty");
            exit();
        }elseif($new_pwd!==$new_pwd_reset){
            header("location:../create-new-password?new-pwd=wrongpwd");
            exit();
        }  elseif(strlen($new_pwd)<6 || strlen($new_pwd)>20){
            header("location:../create-new-password?new-pwd=len-pwd");
            exit();
        }

        $currentDate=date("U");
        $query="SELECT * FROM tb_reset_pwd WHERE pwd_reset_selector=? AND pwd_reset_expires >=?";
        $stmt=mysqli_stmt_init($conx);
        $result=mysqli_stmt_prepare($stmt,$query);
        if(!$result)
        {
            echo "Error en niveau de base de donnée";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ss",$selector,$currentDate);
            mysqli_stmt_execute($stmt);

            $result=mysqli_stmt_get_result($stmt);
            if(!$row=mysqli_fetch_assoc($result)){
                echo "Error en niveau de base de donnée";
                exit();
            }else{
                $tokendin=hex2bin($validator);
                $checktoken=password_verify($tokendin,$row['pwd_reset_token']);
                if($checktoken===false){
                    echo "Error en niveau de base de donnée";
                    exit();
                }elseif($checktoken===true){
                    $tokenEmail=$row["pwd_reset_email"];
                    $query="SELECT * FROM tb_login WHERE Email_user=?";
                    $stmt=mysqli_stmt_init($conx);
                    $result=mysqli_stmt_prepare($stmt,$query);
                    if(!$result)
                    {
                        echo "Error en niveau de base de donnée";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result=mysqli_stmt_get_result($stmt);
                        if(!$row=mysqli_fetch_assoc($result)){
                            echo "Il y'a un erreur !";
                            exit();
                        }else{
                            $query="UPDATE tb_login SET Pwd_user=? WHERE Email_user=?";
                            $stmt=mysqli_stmt_init($conx);
                            $result=mysqli_stmt_prepare($stmt,$query);
                            if(!$result)
                            {
                                echo "Error en niveau de base de donnée";
                                exit();
                            }else{
                                $newhash_pwd=password_hash($new_pwd,PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt,"ss",$newhash_pwd,$tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $query="DELETE FROM tb_reset_pwd WHERE pwd_reset_email=?";
                                $stmt=mysqli_stmt_init($conx);
                                $result=mysqli_stmt_prepare($stmt,$query);
                                if(!$result)
                                {
                                    echo "Error en niveau de base de donnée";
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("location:../Seconnecter?new-pass=updated");
                                }
                            }
                        }
                    }
                }
            }
        }


    }else
    {
        // header("location:Seconnecter");
        // exit();
    }