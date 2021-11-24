<?php
    include_once("Includes/navbar.php");
?>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between">
                <h3 class="text-gray-700 text-3xl font-medium">Les articles</h3>
                <h3 class="text-gray-700 text-3xl font-medium">المقالات</h3>
            </div>
            <form class="grid md:grid-cols-2 gap-5 lg:w-4/5 mt-16 m-auto" id="frm_article" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_article" id="id_article" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Titre d'article">
                    <input type="text" name="title_fr" id="title_fr" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Titre d'article">
                    <input type="text" name="title_ar" id="title_ar" dir="rtl" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="ادخل عنوان المقال">

                    <select name="categories" id="categories" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-center focus:border-blue-500  focus:outline-none shadow">
                        <option value="" disabled selected hidden>--Choisir une categorie--</option>
                       <?php
                            $query="SELECT * FROM tb_category";
                            $result=mysqli_query($conx,$query);
                            if($result){
                                while($row=mysqli_fetch_array($result)){?>
                                    <option value="<?php echo $row["ID_category"]?>" ><?php echo $row["Titre_categorie_fr"]?> --- <?php echo $row["Titre_categorie_ar"]?></option>
                               <?php }
                            }else{?>
                                    <option value="" disabled selected hidden>--Choisir une categorie--</option>
                            <?php }
                       ?>
                    </select>
                    <select dir="rtl" name="village" id="village" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-center focus:border-blue-500  focus:outline-none shadow">
                        <option value="" disabled selected hidden>--Choisir une village</option>
                        <?php
                            $query="SELECT * FROM tb_village";
                            $result=mysqli_query($conx,$query);
                            if($result){
                                while($row=mysqli_fetch_array($result)){?>
                                    <option value="<?php echo $row["ID_village"]?>" ><?php echo $row["Titre_village_ar"]?> --- <?php echo $row["Titre_village_fr"]?></option>
                               <?php }
                            }else{?>
                                    <option value="" disabled selected hidden>--Choisir une village--</option>
                            <?php }
                       ?>
                    </select>
                    <input type="file" name="img_article[]" id="img_article" class="block w-full col-span-2 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Saisir votre prenom">
                    <textarea name="Description_fr" class="border-2 border-gray-500 editor1" id="Description_fr"></textarea>

                    <textarea dir="rtl" name="Description_ar" class="border-2 border-gray-500 editor1" id="Description_ar"></textarea>
                
                <div class="lg:w-full m-auto">
                    <button type="submit" name="submit" id="add_articel" class="text-white bg-green-600 p-2 rounded shadow float-right mt-5">Ajouter</button>
                </div>
            </form>
            <div class="flex flex-col mt-20">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        id</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Titre en francais</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Titre en arabe</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Catégorie</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Village</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Déscription en frncaise</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Déscription en arabe</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        image</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        date</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" id="tbody_article">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
    include_once("Includes/footer.php");
?>