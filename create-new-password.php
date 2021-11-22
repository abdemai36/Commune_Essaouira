<?php
    include_once("Includes/Navbar.php");
?>
    <div class="h-screen w-screen flex justify-center items-center">

        <div class="flex flex-col justify-center items-center bg-white px-5 md:px-20 py-5 rounded-lg h-full md:h-auto w-full lg:w-4/12 shadow">
            
            <div>Logo</div>

            <!-- Danger alert -->
            <?php
                 if(isset($_GET["new-pwd"])){
                    if($_GET["new-pwd"]=="empty"){?>
                     <div class="w-full text-white bg-red-500 rounded">
                        <div class="p-4">
                            <div class="flex">
                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                    <path
                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                    </path>
                                </svg>
                                <p class="mx-3">Saisr les deux mots de passe</p>
                            </div>
                        </div>
                    </div>
                    <?php }
                }
                if(isset($_GET["new-pwd"])){
                    if($_GET["new-pwd"]=="wrongpwd"){?>
                     <div class="w-full text-white bg-red-500 rounded">
                        <div class="p-4">
                            <div class="flex">
                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                    <path
                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                    </path>
                                </svg>
                                <p class="mx-3">Les mots de passe saisi ne match pas !</p>
                            </div>
                        </div>
                    </div>
                    <?php }
                }
                if(isset($_GET["new-pwd"])){
                    if($_GET["new-pwd"]=="len-pwd"){?>
                     <div class="w-full text-white bg-red-500 rounded">
                        <div class="p-4">
                            <div class="flex">
                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                    <path
                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                    </path>
                                </svg>
                                <p class="mx-3">Le mot de passe doit etre supérieur à 6 char et à inférieur 20 char !</p>
                            </div>
                        </div>
                    </div>
                    <?php }
                }
            ?>
    
            <!-- End danger alert -->
            <!-- form start -->

            <?php
                $selector=$_GET["selector"];
                $validator=$_GET["token"];

                if(empty($selector) || empty($validator))
                {
                    header("location:Seconnecter");
                    exit();
                }else{
                    if(ctype_xdigit($selector)!==false && ctype_xdigit($validator)!==false)
                    {?>
                    <form action="includes/reset-password.inc.php" method="POST" class="flex flex-col space-y-6 w-full">
                        <div>
                            <p class="text-sm"></p>
                            <input type="hidden" name="selector" value="<?php echo $selector;?>">
                            <input type="hidden" name="validator" value="<?php echo $validator;?>">

                            <input type="password" name="new-pwr" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow"
                                placeholder="Nouvelle mot de passe">
                            <input type="password" name="new-pwd-repeat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:border-blue-500  focus:outline-none shadow"
                                placeholder="Confirmer le mot de passe">
                        </div>
                        <button
                            class="mt-3 text-sm font-semibold bg-blue-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-blue-900"
                            type="submit" name="reset-password-submit">
                            Valider
                        </button>
                    </form>

                    <?php }
                }
            ?>
            
            <!-- End of form -->
        </div>
    </div>
    <script src="/alpine.js"></script>
    <script>

    </script>
</body>

</html>