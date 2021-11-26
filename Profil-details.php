<?php
    include_once("Includes/Navbar.php");
?>

    <div class="h-10 bg-gray-300">
        <div class="containers m-auto flex items-center h-full space-x-2">
            <a href="">Acceuil</a>
            <span>/</span>
            <a href="">Anonces</a>
        </div>
    </div>


    <div class="containers m-auto my-20">

        <h1 class="text-4xl font-light mb-10">Mon espace citoyen</h1>
        <div class="flex justify-between">

            <div
                class="flex flex-col w-full lg:w-96 h-72 bg-white overflow-hidden border-t-4 border-blue-800 rounded-lg shadow-xl">
                <div class="flex items-center justify-between py-5  m-auto">
                    <div class="w-10 h-10 rounded-full"><img src="images/avatar.jpg" alt=""></div>
                    <h1 class="text-3xl uppercase text-blue-800">Abdo Abdo</h1>
                </div>
                <ul class="flex flex-col">
                    <li class="border-t-2 border-b-2 px-2">
                        <a href="#"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <i class="fa fa-th mx-2"></i>
                            <span class="text-sm font-medium">Table de bord</span>
                        </a>
                    </li>
                    <li class=" border-b-2 px-2">
                        <a href="#"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <i class="fa fa-user mx-2"></i>
                            <span class="text-sm font-medium">Profile</span>
                        </a>
                    </li>
                    <li class=" border-b-2 px-2">
                        <a href="#"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <i class="far fa-envelope mx-2"></i>
                            <span class="text-sm font-medium">Reclamations</span>
                        </a>
                    </li>
                    <li class="  px-2">
                        <a href="#"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-red-500">
                            <i class="fas fa-sign-out-alt mx-2"></i>
                            <span class="text-sm font-medium">Deconnecter</span>
                        </a>
                    </li>


                </ul>
            </div>
            <div>

            </div>
            <div class="w-full flex justify-center">
                <div class="w-4/5 bg-white rounded-lg shadow-xl border-blue-800 border-t-4">
                    <h1 class="text-center text-4xl font-light mt-5">Mon profil</h1>
                    <div class="w-32 h-32"><img src="images/avatar.jpg" alt=""></div>
                    <form action="" class="p-4">

                        <input type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow"
                            placeholder="Saisir votre nom">
                        <input type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow"
                            placeholder="Saisir votre prenom">

                        <button class="primary-color text-white p-2 rounded">Modifier</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php
    include_once("Includes/footer.php");
?>


 