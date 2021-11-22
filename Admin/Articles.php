<?php
    include_once("Includes/navbar.php");
?>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between">
                <h3 class="text-gray-700 text-3xl font-medium">Les articles</h3>
                <h3 class="text-gray-700 text-3xl font-medium">المقالات</h3>
            </div>
            <form class="grid md:grid-cols-2 gap-5 lg:w-4/5 mt-16 m-auto">
                
                    <input type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Titre d'article">
                    <input dir="rtl" type="text" name="titre_ar" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="ادخل عنوان المقال">

                    <select name="categories" id="" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-center focus:border-blue-500  focus:outline-none shadow">
                        <option value="" disabled selected hidden>--Choisir une categorie--</option>
                       <?php
                            $query="SELECT * FROM tb_category";
                            $result=mysqli_query($conx,$query);
                            if($result){
                                while($row=mysqli_fetch_array($result)){?>
                                    <option value="<?php echo $row["ID_category"]?>" ><?php echo $row["Titre_fr"]?> --- <?php echo $row["Titre_ar"]?></option>
                               <?php }
                            }else{?>
                                    <option value="" disabled selected hidden>--Choisir une categorie--</option>
                            <?php }
                       ?>
                    </select>
                    <select dir="rtl" name="village" id="" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-center focus:border-blue-500  focus:outline-none shadow">
                        <option value="" disabled selected hidden>--Choisir une village</option>
                        <?php
                            $query="SELECT * FROM tb_village";
                            $result=mysqli_query($conx,$query);
                            if($result){
                                while($row=mysqli_fetch_array($result)){?>
                                    <option value="<?php echo $row["ID_village"]?>" ><?php echo $row["Titre_ar"]?> --- <?php echo $row["Titre_fr"]?></option>
                               <?php }
                            }else{?>
                                    <option value="" disabled selected hidden>--Choisir une village--</option>
                            <?php }
                       ?>
                    </select>
                    <input type="file" class="block w-full col-span-2 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Saisir votre prenom">
                    <textarea name="Description_fr" class="border-2 border-gray-500 editor1" id="editor1"></textarea>

                    <textarea dir="rtl" name="Description_ar" class="border-2 border-gray-500 editor1" id="editor2"></textarea>
                
                <div class="lg:w-full m-auto">
                    <button type="submit" name="submit" class="text-white bg-green-600 p-2 rounded shadow float-right mt-5">Ajouter</button>
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
                                        Titre</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Categorie</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Image</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Contenu</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        1
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Dechet chimique
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Nature
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Dechet.png</td>


                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                        Dolores,
                                        quidem vero placeat laboriosam obcaecati maiores dolor. Odit
                                        ex
                                        voluptatem consectetur dolorum...</td>

                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium flex justify-center space-x-5
                                                ">
                                        <button class=" text-white bg-blue-800 rounded p-2">
                                            Update
                                        </button>
                                        <button class=" text-white bg-red-500 rounded p-2"
                                            onclick="openModal()">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
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