<?php 
    session_start();
    include_once("Admin/includes/db.inc.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=FILTER_VAR($_POST['name'],FILTER_SANITIZE_STRING);
        $object=FILTER_VAR($_POST['object'],FILTER_SANITIZE_STRING);
        $addresse=FILTER_VAR($_POST['addresse'],FILTER_SANITIZE_STRING);
        $phone=FILTER_VAR($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $email=FILTER_VAR($_POST['email'],FILTER_SANITIZE_EMAIL);
        $message=FILTER_VAR($_POST['message'],FILTER_SANITIZE_STRING);
        $village=FILTER_VAR($_POST['village'],FILTER_SANITIZE_STRING);

        if(!empty($addresse) && !empty($email) && !empty($phone) && !empty($message) && !empty($name))
        {
            if(!preg_match("/^[a-zA-Zأ-ي\s]*$/u",$name) || is_numeric($name))
            {
                header("location:reclamation?langu=".$_SESSION['langu']."&reclame=name");
                exit();
            }
            if(is_numeric($message))
            {
                header("location:reclamation?langu=".$_SESSION['langu']."&reclame=message");
                exit();
            } 
            if(!preg_match("/^[a-zA-Zأ-ي\s]*$/u",$object))
            {
                header("location:reclamation?langu=".$_SESSION['langu']."&reclame=object");
                exit();
            } 
            if(!preg_match("/^[\+0-9\-\(\)\s]*$/",$phone))
            {
                header("location:reclamation?langu=".$_SESSION['langu']."&reclame=phone");
                exit();
            } 
            if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
            {
                header("location:reclamation?langu=".$_SESSION['langu']."&reclame=email");
                exit();
            }
            //management of image 
            $files_Name = $_FILES['reclamation_files']['name'];
            $files_Size = $_FILES['reclamation_files']['size'];
            $files_tmpN = $_FILES['reclamation_files']['tmp_name'];
            $image='';
            $dataImg='';
            $files_type = $_FILES['reclamation_files']['type'];
            $files_Allow_Extansion = array("jpeg","png","jpg","gif","PNG","JEPJ","JPG","docx","PDF","pdf","");
            
            
            
            if (is_array($_FILES['reclamation_files']['name']) || is_object($_FILES['reclamation_files']['name']))
            {
                foreach($_FILES['reclamation_files']['name'] as $key=>$val)
                {
                    $image=$_FILES['reclamation_files']['name'][$key];
                    $files_tmpN=$_FILES['reclamation_files']['tmp_name'][$key];
                    $files_Extansion =pathinfo($image,PATHINFO_EXTENSION);
                    $image=rand(0,1000) . '_' .$image;
                    move_uploaded_file($files_tmpN,'Admin/avatar/'.$image);
                    $dataImg .=$image." ";
                }
                if(!in_array($files_Extansion,$files_Allow_Extansion))
                {
                    header("location:reclamation?langu=".$_SESSION['langu']."&reclame=files");
                    exit();
                } 
                if($files_Size[0] > 4194304)
                {
                    header("location:reclamation?langu=".$_SESSION['langu']."&reclame=sizefile");
                    exit();
                }  
                else
                {
                    //Load Composer's autoloader
                    require 'vendor/autoload.php';
                    // //Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host = "ssl://smtp.gmail.com";                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = "sidifaressbazar@gmail.com";                     //SMTP username
                    $mail->Password   = "sidifaress2021";                               //SMTP password
                    $mail->SMTPSecure = "ssl";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 465;   

                    //Content
                    $mail->isHTML(true); 
                    $mail->CharSet="UTF-8";

                    $mail->setFrom($email,$name);
                    $mail->addAddress("sidifaressbazar@gmail.com",$name); 

                    //attachement files 
                    //Attachments
                    if($files_Size[0]>0){
                        $res=$dataImg;
                        $res=explode(" ",$dataImg);
                        $count=count($res)-1;
                        for($i=0;$i<$count;$i++){
                            $mail->addAttachment('Admin/avatar/'.$res[$i]);
                        }
                    }

                    $mail->Subject = "Réclamation";
                    $mail->Body    = "<h3>Mr/Mme</h3> ".$name."<br><h3>Numéro de téléphone :</h3>".$phone."<h3>Adresse :</h3>".$addresse."<br><h3>Email :</h3>".$email."<br><h3>Objet :</h3>".$object."<br><h3>Réclamation :</h3>".$message."<br><h3>Les piéce joine :</h3>";
                    
                    $mail->send();
                    if($mail)
                    {
                        $query="INSERT INTO tb_reclamation(`Name`,`Email`,`Addresse`,`ID_village`,`phone`,`Object`,`Message`,`Piece_joine`) 
                        VALUES('$name','$email','$addresse','$village','$phone','$object','$message','$dataImg')";
                        $result=mysqli_query($conx,$query);
                        if($result){ 
                            header("location:reclamation?langu=".$_SESSION['langu']."&reclame=success");
                            exit();                   
                        }else{
                            header("location:reclamation?langu=".$_SESSION['langu']."&reclame=error");
                            exit();
                        }   
                    }else{
                        header("location:reclamation?langu=".$_SESSION['langu']."&reclame=error");
                        exit();
                    }

                }
            }
        }else
        {
            header("location:reclamation?langu=".$_SESSION['langu']."&reclame=empty");
            exit();
        }
    }
    else
    {
        header("location:404.php");
        exit();
    }