<?php
    include_once("Includes/Navbar.php");
?>
    <div class="h-screen w-screen flex justify-center items-center">
        <div
            class="flex flex-col justify-center items-center bg-white px-5 md:px-20 py-5 rounded-lg h-full md:h-auto w-full lg:w-4/12 shadow">
            <div class="w-full">
                <a href="Seconnecter" class="float-left flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                    </svg>
                    Annuler
                </a>
            </div>
            <div>
                <img src="images/logoo.jpg" alt="">
            </div>


            <!-- Danger alert -->
                <?php
                    if(isset($_GET["form"]))
                    {  if($_GET['form']=="empty"){
                        ?>
                       <div class="w-full text-white bg-red-500 rounded">
                            <div class="flex p-4">
                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                    <path
                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                    </path>
                                </svg>
                                <p class="mx-3">Saisi tous les informations.</p>
                            </div>
                    </div>
                    <?php }
                    }
                     if(isset($_GET["form"])=="pwd")
                     {  if($_GET["form"]=="pwd"){
                         ?>
                        <div class="w-full text-white bg-red-500 rounded">
                             <div class="flex p-4">
                                 <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                     <path
                                         d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                     </path>
                                 </svg>
                                 <p class="mx-3">Les mots de passe saisi ne match pas !</p>
                            </div>
                     </div>
                     <?php }
                     }

                     if(isset($_GET["form"])=="len-pwd")
                     {  
                        if($_GET["form"]=="len-pwd"){
                         ?>
                        <div class="w-full text-white bg-red-500 rounded">

                             <div class="flex p-4">
                                 <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                     <path
                                         d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                     </path>
                                 </svg>
                                 <p class="mx-3">Le mot de passe doit etre supérieur à 6 char et à inférieur 20 char!.</p>
                             </div>
                     </div>
                     <?php }
                     }
                ?>        
            <!-- End danger alert -->
            <!-- form start -->
            <form action="Includes/signup.inc" method="POST" class="flex flex-col space-y-6 w-full">

                <input type="text" name="last-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Saisir votre nom">

                <input type="text" name="first-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow"  placeholder="Saisir votre prenom">

                <input type="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Saisir votre email">

                <input type="password" name="pwd" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Saisir nouveau mot de passe">

                <input type="password" name="pwd-repeat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow" placeholder="Confirmer le nouveau mot de passe ">

                <button type="submit" name="create-submit" class="mt-3 text-sm font-semibold bg-blue-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-blue-900">
                    Créer
                </button>
            </form>
            <!-- End of form -->
        </div>
    </div>
</body>

</html>