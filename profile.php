<?php

    include_once("Includes/Navbar.php");
    include_once("Includes/sidbar_profile.php");
?>

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

                    <a href="profile"
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
