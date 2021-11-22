<?php
       session_start();
       include_once("../Admin/Includes/db.inc.php");
    if(isset($_POST["create-submit"])){

        $last_name=mysqli_real_escape_string($conx,$_POST["last-name"]);
        $first_name=mysqli_real_escape_string($conx,$_POST["first-name"]);
        $email=mysqli_real_escape_string($conx,$_POST["email"]);
        $pwd=mysqli_real_escape_string($conx,$_POST["pwd"]);
        $pwd_repeat=mysqli_real_escape_string($conx,$_POST["pwd-repeat"]);

        if(empty($last_name) || empty($first_name) || empty($email) || empty($pwd) || empty($pwd_repeat))
        {
            header("location:../Inscription?form=empty");
            exit();
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z-\s]*$/",$first_name) && !preg_match("/^[a-zA-Z-\s]*$/",$last_name)){
            header("location:../Inscription?form=uslsremail");
            exit();
        }elseif($pwd !== $pwd_repeat)
        {
            header("location:../Inscription?form=pwd");
            exit();
        }
        elseif(strlen($pwd)<6 || strlen($pwd)>20){
            header("location:../Inscription?form=len-pwd");
            exit();
        }       
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("location:../Inscription?form=email");
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z-\s]*$/",$first_name)){
            header("location:../Inscription?form=f-name");
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z-\s]*$/",$last_name)){
            header("location:../Inscription?form=l-name");
            exit();
        }else{
            $query="SELECT Email_user FROM tb_login WHERE Email_user=?";
            $stmt=mysqli_stmt_init($conx);
            if(!mysqli_stmt_prepare($stmt,$query)){
                header("location:../Inscription?form=uralreadyexcited");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result=mysqli_stmt_num_rows($stmt);
                if($result>0)
                {
                    header("location:../Inscription?form=urtaken");
                    exit();
                }else{
                    $query="INSERT into tb_login(F_name_user,L_name_user,Email_user,Pwd_user,GoupeID) VALUE (?,?,?,?,?) ";
                    $stmt=mysqli_stmt_init($conx);
                    $GoupeID=0;
                    $hash_password=password_hash($pwd,PASSWORD_DEFAULT);
                    if(!mysqli_stmt_prepare($stmt,$query)){
                        header("location:../Inscription?form=sqlerror");
                        exit();
                    }else{
                        
                        mysqli_stmt_bind_param($stmt,"ssssb",$first_name,$last_name,$email,$hash_password,$GoupeID);
                        mysqli_stmt_execute($stmt);
                        header("location:../Seconnecter");
                        exit();
                    }
                }
            }
        }

    }else
    {
        header("location:null_page.php");
        exit();
    }

   
