<?php
    include_once("Includes/navbar.php");
?>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">

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
                                                    Nom complet</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Adresse</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Email</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Numero Telephone</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Objet</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Message</th>
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
                                                    Mouad eeee
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    tikioune assaysse
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    Mouad@gmail.com</td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    0606060606</td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    Probleme de déchet</td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos est
                                                    accusamus illum ratione....</td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-right h-full border-b border-gray-200 text-sm leading-5 font-medium flex justify-center items-center space-x-5
                                                    ">
                                                    <button class="link link-hover" onclick="openModal()">
                                                        Voir plus >
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
            </div>
        </div>
    </div>




    <!-- pop up details -->
    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7);">
        <div
            class="border border-teal-500  modal-container bg-white w-11/12 md:max-w-lg mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center ">
                    <p class="text-2xl font-bold">Declaration details</p>
                    <button class="modal-close">X</button>
                </div>
                <!--Body-->
                <div class="my-5 px-3">
                    <div class="mb-10">
                        <p><span class="font-bold">Nom complet :</span> Mouad ell</p>
                        <p><span class="font-bold">Email :</span> Mouad@gmai.com</p>
                        <p><span class="font-bold">Telephone :</span> 0606060606</p>
                        <p><span class="font-bold">Adresse :</span> tikioune assaysse</p>
                    </div>

                    <div class="font-bold text-2xl mb-3">
                        objet : Probleme de déchet
                    </div>

                    <div class="text-lg mb-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora maiores, illo,
                        nesciunt exercitationem, odit nisi praesentium ea quia est incidunt quam porro
                        excepturi neque sed. Fuga repellat provident ipsum alias.
                    </div>

                    <div class="font-bold text-2xl mb-3">
                        <span>Piece jointe :</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php
    include_once("Includes/footer.php");
?>