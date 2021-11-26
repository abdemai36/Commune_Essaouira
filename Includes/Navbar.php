<?php
    session_start();
    include_once("Admin/Includes/db.inc.php");
    if(!isset($_SESSION['iduser']) && empty($_SESSION['iduser']))
    {
        header("location:Seconnecter");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Rubik&family=Sirin+Stencil&display=swap"
        rel="stylesheet">

</head>

<body class="overflow-x-hidden w-screen" x-data="{navOpen: false, scrolledFromTop: false }"
    x-init="window.pageYOffset >= 10 ? scrolledFromTop = true : scrolledFromTop = false"
    @scroll.window="window.pageYOffset >= 10 ? scrolledFromTop = true : scrolledFromTop = false"
    :class="{'overflow-hidden': navOpen,'overflow-scroll': !navOpen}">



    <header class="w-full  flex justify-between primary-color items-center transition-all duration-200h-20 z-50 "
        :class="{'h-20': !scrolledFromTop, 'h-14 fixed top-0 shadow ': scrolledFromTop}">
        <div class="containers m-auto flex justify-between items-center w-full">
            <nav>
                <button class="md:hidden" @click="navOpen = !navOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <ul class="fixed left-0 right-0 min-h-screen px-4 pt-8 space-y-4 z-50 md:z-0 primary-color text-white text-md transform transition duration-300 translate-x-full md:relative md:flex md:space-x-10 md:min-h-0 md:px-0 md:py-0 md:space-y-0 md:translate-x-0"
                    :class="{'translate-x-full': !navOpen}" :class="{'translate-x-0': navOpen}">
                    <li>
                        <a href="#">
                            <img src="images/logo_casablanca2.png"
                                class="h-12 transform origin-left transition duration-200"
                                :class="{'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop}" />
                        </a>
                    </li>
                    <li class="flex items-center  ">
                        <a href="#" @click="navOpen = false">Commune</a>

                    </li>
                    <li class="flex items-center" x-data="{ open: false }" @mouseleave="open = false">
                        <a href="#features" @click="navOpen = false" @mouseover="open = true">Arrondissements</a>

                    </li>
                    <li class="flex items-center">
                        <a href="#about" @click="navOpen = false">Services Citoyen</a>
                    </li>
                    <li class="flex items-center">
                        <a href="#contact" @click="navOpen = false">Partenaires</a>
                    </li>
                    <li class="flex items-center">
                        <a href="#contact" @click="navOpen = false">Ma ville</a>
                    </li>
                </ul>
            </nav>
            <div class="flex text-white">
            <a href="" class="text-white flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<a href='../profile'>".$_SESSION['username']."</a>";
                    }else{
                      echo "<a href='../Seconnecter'>Compte citoyen</a>";
  
                    }
                ?>
               
            </a>
            </div>
        </div>

    </header>