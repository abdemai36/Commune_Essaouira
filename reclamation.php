<?php
    include_once("Includes/Navbar.php");
    include_once("Includes/sidbar_profile.php");
?>
        <div class="w-full flex justify-center">
            <div class="w-full lg:w-4/5 mt-10 lg:mt-0 bg-white rounded-lg shadow-xl border-blue-800 border-t-4 p-4">
            <?php
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="empty")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['S\'il vous plaît saisir tous les information']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="name")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Votre nom est invalide']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="message")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Votre message est invalide']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="object")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Votre objet est invalide']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="phone")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Votre numéro de téléphone est invalide']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="email")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Votre email est invalide']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="sizefile")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Les fichiers uploder sont volumineux (maximum taille 4MB)']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="files")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Saisir seulement les fichier avec les extentions (jpeg | png | jpg | gif | jpg | docx | pdf)']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="error")
                    {?>
                            <div class="bg-red-100 border-<?php echo $lang['border'];?>-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['error']?></p>
                                <p><?php echo $lang['Réclamation échoué']?></p>
                            </div>
                    <?php }
                }
                if(isset($_GET["reclame"]))
                {
                    if($_GET["reclame"]=="success")
                    {?>
                            <div class="bg-green-100 border-<?php echo $lang['border'];?>-4 border-green-500 text-green-900 p-4" role="alert">
                                <p class="font-bold"><?php echo $lang['success']?></p>
                                <p><?php echo $lang['Réclamation envoyée avec succès. Merci']?></p>
                            </div>
                    <?php }
                }
            ?>
                <h1 class=" text-4xl font-light mt-5"><?php echo $lang["Nouvelle reclamation"];?></h1>
                <form action="reclamation_send" method="POST" enctype="multipart/form-data" class="p-4">

                    <input type="text" name="object" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="<?php echo $lang["Saisir votre objet"];?>">
                    <textarea name="message" required id="" cols="30" rows="8" placeholder="<?php echo $lang["Message"];?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4"></textarea>
                    
                    <h1 class=" text-xl font-light mt-5"><?php echo $lang["Adresse"];?></h1>
                    <select name="village" id="" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4">
                        <?php
                            $query="SELECT * FROM tb_village";
                            //$GroupeID=0;
                            $stmt=mysqli_stmt_init($conx);
                            if(!mysqli_stmt_prepare($stmt,$query)){
                                header("location:?form=sqlerror");
                                exit();
                            }else{
                                mysqli_stmt_execute($stmt);
                                $result=mysqli_stmt_get_result($stmt);
                                if($row=mysqli_fetch_assoc($result))
                                {?>
                                    <option value="<?php echo $row['ID_village'];?>"><?php echo $row['Titre_village_'.$_SESSION['langu'].''];?></option>
                                <?php }else{?>
                                    <option value="<?php echo $row['ID_village'];?>"><?php echo $lang["Seletioner village"];?></option>  
                                <?php }
                            }
                        ?>
                    </select>
                    <input type="text" name="addresse" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4" placeholder="<?php echo $lang["Saisir votre adresse"];?>">
                    
                    <h1 class=" text-xl font-light mt-5"><?php echo $lang['vos informations'];?></h1>
                    <input type="text" name="name" value="<?php echo $_SESSION['username'];?>" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4" placeholder="<?php echo $lang["Saisir votre nom complet"];?>">
                    <input type="email" name="email" value="<?php echo $_SESSION['email'];?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4" placeholder="<?php echo $lang["Saisir votre email"];?>" required>
                    <input type="number" name="phone" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4" placeholder="<?php echo $lang["Saisir votre numéro de téléphone"];?>">
                   
                    <h1 class=" text-xl font-light mt-5"><?php echo $lang['Ajouter un document'];?></h1>
                    <input type="file" multiple name="reclamation_files[]" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow my-4">
                    <button class="mt-3 text-sm font-semibold bg-blue-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-blue-900" type="submit">
                    <?php echo $lang['Réclamer'];?>
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("Includes/footer.php");
?>