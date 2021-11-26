<?php

    include_once("Includes/Navbar.php");
?>

<div class="containers m-auto my-20">

        <h1 class="text-4xl font-light mb-10">Mon espace citoyen</h1>
        <div class="flex flex-col lg:flex-row justify-between">
            <div
                class="flex flex-col w-full lg:w-96 h-72 bg-white overflow-hidden border-t-4 border-blue-800 rounded-lg shadow-xl">
                <div class="flex items-center justify-between py-5  m-auto">
                    <div class="w-10 h-10 rounded-full"><img src="images/avatar.jpg" alt=""></div>
                    <h1 class="text-3xl uppercase text-blue-800"><?php echo $_SESSION['username'];?></h1>
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
                <div
                    class="rounded-lg overflow-hidden shadow-xl border-blue-800 border-t-4  bg-white-500 w-full lg:w-4/5 h-full">
                    <div class="h-40 w-full bg-center bg-cover" style="background-image: url('images/essaouira.jpg');">
                    </div>
                    <div class="flex justify-center -mt-8">
                        <img src="images/avatar.jpg" class="rounded-full border-solid -mt-3 h-20 w-20">

                    </div>
                    <div class="text-center px-3 pb-6 pt-2">
                        <h3 class="text-black text-sm bold font-sans">
                            <?php 
                                
                                    echo $_SESSION['username'];
                                
                            ?>
                        </h3>
                        <p class="mt-2 font-sans font-light text-black">
                            <?php 
                                
                                    echo $_SESSION['email'];
                                
                            ?>
                        </p>
                    </div>

                    <a href=""
                        class="text-center mt-3 text-sm font-semibold bg-blue-800 w-1/2 m-auto text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-blue-900 mb-5"
                        type="submit">
                        Editer votre profile
                </a>
                </div>
            </div>
        </div>

    </div>

<?php
    include_once("Includes/footer.php");
?>
