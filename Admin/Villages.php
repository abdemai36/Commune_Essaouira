<?php
    include_once("Includes/navbar.php");
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between">
                <h3 class="text-gray-700 text-3xl font-medium">Les villages</h3>
                <h3 class="text-gray-700 text-3xl font-medium">الدواوير</h3>
            </div>
            <form class="grid md:grid-cols-2 gap-5 lg:w-4/5 mt-16 m-auto" method="POST" id="Form_village">
                <div>
                    <input type="hidden" name="id_village" id="id_village" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Nom de village"> 
                    <input type="text" name="name_village_fr" id="name_village_fr" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Nom de village"> 
                </div>
                <div dir="rtl">
                    <input type="text" name="name_village_ar" id="name_village_ar" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="ادخل اسم الدوار">
                </div>
                <div class="lg:w-full m-auto">
                    <button type="submit" name="submit" id="btn_add_village" class="text-white bg-green-600 p-2 rounded shadow float-right mt-5">Ajouter</button>
                </div>
            </form>
            <div class="flex flex-col mt-20">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        id</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Nom de village</th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        اسم الدوار</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" id="tbody_village">
                               
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