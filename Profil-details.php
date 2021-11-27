<?php
    include_once("Includes/Navbar.php");
    include_once("Includes/sidbar_profile.php");
    if(isset($_POST["submit"]))
    {
        $f_name=$_POST["f-name"];
        $l_name=$_POST["l-name"];
        $email=$_POST["email"];
        $new_pass=$_POST["new-pass"];
        $old_pass=$_POST["old-pass"];

        if(empty($f_name) || empty($l_name)|| empty($new_pass) || empty($old_pass)){
            header("location:Profil-details?langu=".$_SESSION['langu']."&form=empty");
            exit();
        }elseif($old_pass!==$new_pass){
            header("location:Profil-details?langu=".$_SESSION['langu']."&form=wrongpassword");
            exit();
        }elseif(strlen($new_pass)<6 || strlen($new_pass)>20){
            header("location:Profil-details?langu=".$_SESSION['langu']."&form=lenpassword");
            exit();
        }else
        {
            $query="UPDATE tb_login SET Pwd_user=?,F_name_user=?,L_name_user=? WHERE Email_user=?";
            $stmt=mysqli_stmt_init($conx);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
                echo "Error en niveau de base de donnée";
                exit();
            }else{
                $newhash_pwd=password_hash($new_pass,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"ssss",$newhash_pwd,$f_name,$l_name,$email);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_prepare($stmt,$query);
                if(!$result){
                    header("location:Profil-details?langu=".$_SESSION['langu']."&form=error");
                    exit();
                }else{
                    ///start here
                    $query="SELECT * FROM tb_login WHERE Email_user=?";
                    $stmt=mysqli_stmt_init($conx);
                    if(!mysqli_stmt_prepare($stmt,$query)){
                        header("location:Profil-details?langu=".$_SESSION['langu']."&form=error");
                            exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"s",$email);
                        mysqli_stmt_execute($stmt);
                        $result=mysqli_stmt_get_result($stmt);
                        if($row=mysqli_fetch_assoc($result))
                        {
                            $_SESSION["iduser"]=$row["ID_user"];
                            $_SESSION["username"]=$row["F_name_user"]." ".$row["L_name_user"];
                            $_SESSION["email"]=$row["Email_user"];
                            header("location:Profil-details?langu=".$_SESSION['langu']."&form=success");
                            exit();
                        }else{
                            header("location:Profil-details?langu=".$_SESSION['langu']."&form=error");
                            exit();
                        }
                    }
                    //end here
                }
            }
        }

    }
    
?>
            <div class="w-full flex justify-center">
                <div class="w-4/5 bg-white rounded-lg shadow-xl border-blue-800 border-t-4">

                    <div class="w-full flex justify-center"><img src="images/avatar.jpg" alt="" class="w-32 h-32"></div>
                    <h1 class="text-center text-4xl font-light mt-5"><?php echo $lang["Mon profile"];?></h1>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="p-4">
                    <?php
                        $name=explode(" ",$_SESSION['username']);
                        $f_name=$name[0];
                        $l_name=$name[1];
                    ?>
                        <input type="text" name="f-name" value="<?php echo $f_name;?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4"  placeholder="<?php echo $lang["Saisir votre nom complet"];?>">
                        <input type="text" name="l-name" value="<?php echo $l_name;?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4"  placeholder="<?php echo $lang["Saisir votre nom complet"];?>">
                        <input type="text" name="email" readonly value="<?php echo $_SESSION['email'];?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4" placeholder="<?php echo $lang["Saisir votre email"];?>">
                        <input type="text" name="new-pass" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4"  placeholder="<?php echo $lang["Saisir votre ancien mot de passe"];?>">
                        <input type="text" name="old-pass" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4"  placeholder="<?php echo $lang["Saisir votre nouveau mot de passe"];?>">
                        <div class="w-full flex justify-center mt-5">
                            <button type="submit" name="submit" class="primary-color text-white p-2 rounded w-full"><?php echo $lang['Modifier'];?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php
    include_once("Includes/footer.php");
?>
