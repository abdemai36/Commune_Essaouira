<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception; 
    ini_set('display_errors', '1');
        error_reporting(-1);
    include_once("../Admin/Includes/db.inc.php");
   

    if(isset($_POST["send-code"]))
    {
        if(isset($_POST["email"])){

            $email=$_POST["email"];
            $query="SELECT * FROM tb_login WHERE Email_user=?";
            $stmt=mysqli_stmt_init($conx);
            $result=mysqli_stmt_prepare($stmt,$query);
            if(!$result)
            {
                echo "Error en niveau de base de donnée 1";
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);

                $result=mysqli_stmt_get_result($stmt);
                if(!$row=mysqli_fetch_assoc($result)){
                    header("location:../reset-password?reset=invalide");
                    exit();
                }else{
                    $selector=bin2hex(random_bytes(8));
                    $token=random_bytes(32);
        
                    $URL="http://essaouiracity.ma/create-new-password?selector=".$selector."&token=".bin2hex($token);
        
                    $expires=date("U")+1800;
        
                    
                    $email_user=mysqli_real_escape_string($conx,$_POST["email"]);
        
                    $query="DELETE FROM tb_reset_pwd WHERE pwd_reset_email=?";
                    $stmt=mysqli_stmt_init($conx);
                    $result=mysqli_stmt_prepare($stmt,$query);
                    if(!$result)
                    {
                        echo "Error en niveau de base de donnée 3";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"s",$email_user);
                        mysqli_stmt_execute($stmt);
                    }
        
                    $query="INSERT INTO tb_reset_pwd(pwd_reset_email,pwd_reset_selector,pwd_reset_token,pwd_reset_expires) VALUES(?,?,?,?)";
                    $stmt=mysqli_stmt_init($conx);
                    $result=mysqli_stmt_prepare($stmt,$query);
                    if(!$result)
                    {
                        echo "Error en niveau de base de donnée 4";
                        exit();
                    }else{
                        $hashToken=password_hash($token,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"ssss",$email_user,$selector,$hashToken,$expires);
                        mysqli_stmt_execute($stmt);
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conx);
        
                    require '../vendor/autoload.php';
                    // //Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    //$mail->isSMTP();  
                    //Send using SMTP
                    $mail->Host = "essaouiracity.ma";                     
                    //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = "essaouira@essaouiracity.ma";                     //SMTP username
                    $mail->Password   = "essaouiracity2000";                               //SMTP password
                    $mail->SMTPSecure = "ssl";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 465;   
        
                    $mail->isHTML(true); 
                    $mail->CharSet="UTF-8";
        
                    $mail->setFrom('essaouira@essaouiracity.ma',"Essaouira commune");
                    $mail->addAddress($email_user,"Essaouira commune"); 
        
                    $mail->Subject = "Nouvell mot de passe";
                    $mail->Body    = " message "."<a target='_blank' href='".$URL."'>".$URL."</a>";
        
                    $mail->send();
                    if($mail)
                    {
                        header("location:../reset-password?reset=success");
                        exit();

                        
                    }else{
                        header("location:../reset-password?reset=empty-email");
                        exit();
                    }
                    
                }
            }
        

        }else{
            header("location:../reset-password");
            exit();
        }
        
    }else
    {
        header("location:../reset-password");
        exit();
    }