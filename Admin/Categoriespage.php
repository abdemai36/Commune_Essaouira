<?php
    include_once("Includes/navbar.php");
?>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between">
                <h3 class="text-gray-700 text-3xl font-medium">Les Catégories</h3>
                <h3 class="text-gray-700 text-3xl font-medium">الفئات</h3>
            </div>
            <form class="grid md:grid-cols-2 gap-5 lg:w-4/5 mt-16 m-auto" id="Form_categorie" method="POST">
                <div>
                    <input type="hidden" name="id_categorie" id="id_categorie" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Nom de catégorie"> 
                    <input type="text" name="category_fr" id="category_fr" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Nom de catégorie"> 
                </div>
                <div dir="rtl">
                    <input type="text" name="category_ar" id="category_ar" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="ادخل اسم الفئة">
                </div>
                <div class="lg:w-full m-auto">
                    <button type="submit" name="submit" id="add_categorie" class="text-white bg-green-600 p-2 rounded shadow float-right mt-5">Ajouter</button>
                </div>
            </form>
            <div class="flex flex-col mt-20">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead >
                                <tr class="text-center">
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        id</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Nom de catégorie</th>
                                    <th dir="rtl" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        اسم الفئة</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" id="tbody_categorie">
                                
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