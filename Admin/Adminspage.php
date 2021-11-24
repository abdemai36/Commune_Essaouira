<?php
    include_once("Includes/navbar.php");
?>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">Admins</h3>
                        <form method="POST" id="Form_adm">
                            <div class="grid md:grid-cols-2 gap-5 lg:w-8/12 m-auto">
                            <input type="hidden" name="id_adm" id="id_adm" placeholder="Saisir votre prenom" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow">
                            <input type="text" name="f-name" id="f_name" placeholder="Saisir votre prenom" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow">
                            <input type="text" name="l-name" id="l_name" placeholder="Saisir votre nom" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow">
                            <input type="email" name="email" id="email" placeholder="Saisir votre email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow">
                            <input type="password" name="pwd" id="pwd" placeholder="Saisir votre mot de passe" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow">
                            </div>
                            <div class="lg:w-8/12 m-auto">
                            <button type="submit" name="submit" id="btn_add" class="text-white bg-green-600 p-2 rounded shadow float-right mt-5">Ajouter</button>
                            </div>
                        </form>
                        <div class="flex flex-col mt-20">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    id</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Prénom</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Nom</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Email</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Action</th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white" id="tbody_admin">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
<?php
    include_once("Includes/footer.php");
?>