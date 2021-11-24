<?php
    include_once("Includes/navbar.php");
?>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between">
                <h3 class="text-gray-700 text-3xl font-medium">Je veux</h3>
                <h3 class="text-gray-700 text-3xl font-medium">اريد</h3>
            </div>
            <form class="grid md:grid-cols-2 gap-5 lg:w-4/5 mt-16 m-auto" id="frm_jeveux" method="POST">
                <input type="hidden" name="id_jeveux" id="id_jeveux" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Titre d'article">
                    <input type="text" name="title_jeveux_fr" id="title_jeveux_fr" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Titre d'article">
                    <input type="text" name="title_jeveux_ar" id="title_jeveux_ar" dir="rtl" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="ادخل عنوان المقال">

                    <select name="categories_jeveux" id="categories_jeveux" class="col-span-2 block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-center focus:border-blue-500  focus:outline-none shadow">
                        <option value="" disabled selected hidden>--Choisir une categorie--</option>
                        <option value="Savoir">Savoir</option>
                        <option value="Créer">Créer</option>
                        <option value="Investir">Investir</option>
                        <option value="Déclarer">Déclarer</option>
                    </select>
                    
                    <textarea name="Description_jeveux_fr" class="border-2 border-gray-500 editor1" id="Description_jeveux_fr"></textarea>

                    <textarea dir="rtl" name="Description_jeveux_ar" class="border-2 border-gray-500 editor1" id="Description_jeveux_ar"></textarea>
                
                <div class="lg:w-full m-auto">
                    <button type="submit" name="submit" id="add_jeveux" class="text-white bg-green-600 p-2 rounded shadow float-right mt-5">Ajouter</button>
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
                                        Déscription en frncaise</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Déscription en arabe</th>
                                        <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" id="tbody_jeveux">
                               
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