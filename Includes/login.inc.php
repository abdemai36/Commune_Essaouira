<?php
    session_start();
    include_once("../Admin/Includes/db.inc.php");
    
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    
    if(isset($_POST["login-submit"]))
    {
        $email= mysqli_real_escape_string($conx,$_POST["email"]);
        $pwd= mysqli_real_escape_string($conx,$_POST["pwd"]);

        if(empty($email) || empty($pwd)){
            header("location:../Seconnecter?form=empty");
            exit();
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("location:../Seconnecter?form=email");
            exit();
        }else{
            $query="SELECT * FROM tb_login WHERE Email_user=?";
            //$GroupeID=0;
            $stmt=mysqli_stmt_init($conx);
            if(!mysqli_stmt_prepare($stmt,$query)){
                header("location:../Seconnecter?form=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                if($row=mysqli_fetch_assoc($result))
                {
                    $checkpassword=password_verify($pwd,$row["Pwd_user"]);
                    if($checkpassword==false){
                        header("location:../Seconnecter?form=wrongpwd");
                        exit();
                    }elseif($checkpassword==true){
                        $GroupeID=$row["GoupeID"];
                        if($GroupeID==0){
                            $_SESSION["iduser"]=$row["ID_user"];
                            $_SESSION["username"]=$row["F_name_user"]." ".$row["L_name_user"];
                            $_SESSION["email"]=$row["Email_user"];
                            header("location:../profile");
                            exit();
                        }elseif($GroupeID==1){
                            $_SESSION["iduser"]=$row["ID_user"];
                            $_SESSION["username"]=$row["F_name_user"]." ".$row["L_name_user"];
                            $_SESSION["email"]=$row["Email_user"];
                            header("location:../Admin/Dashboard");
                            exit();
                        }
                    }else{
                        header("location:../Seconnecter?form=wrongpwd");
                        exit();
                    }
                }else{
                    header("location:../Seconnecter?form=wrongpwd");
                    exit();
                }
            }
        }
    }else
    {
        header("location:../Seconnecter");
        exit();
    }
?>