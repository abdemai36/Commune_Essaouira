<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/anoim.css">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>

    </style>
</head>

<body x-data="{navOpen: false, scrolledFromTop: false}"
    x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
    @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false">
    <!-- <header class="
          fixed
          w-full
          bg-blue-500
          flex
          justify-between
          items-center
          px-4
          md:px-12
          transition-all
          duration-200
          h-24
       " :class="{'h-24': !scrolledFromTop, 'h-14': scrolledFromTop}">
        <a href="#">
            <img src="/images/logo1.png" class="h-12 transform origin-left transition duration-200"
                :class="{'scale-100': !scrolledFromTop, 'scale-75': scrolledFromTop}" />
        </a>
        <nav>
            <button class="md:hidden" @click="navOpen = !navOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <ul class="
                fixed
                left-0
                right-0
                min-h-screen
                px-4
                pt-8
                space-y-4
                bg-blue-500
                text-white
                transform
                transition
                duration-300
                translate-x-full
                md:relative md:flex md:space-x-10 md:min-h-0 md:px-0 md:py-0 md:space-y-0 md:translate-x-0
             " :class="{'translate-x-full': !navOpen}" :class="{'translate-x-0': navOpen}">
                <li class="">
                    <a href="#" @click="navOpen = false">Home</a>
                </li>
                <li class="">
                    <a href="#features" @click="navOpen = false">Features</a>
                </li>
                <li>
                    <a href="#about" @click="navOpen = false">About</a>
                </li>
                <li>
                    <a href="#contact" @click="navOpen = false">Contact</a>
                </li>
            </ul>
        </nav>
    </header> -->
    <!-- overlay-menu -->

    <div class="fixed bottom-10 right-10 flex flex-col space-y-96">
        <div class=" bg-blue-400 p-3 rounded text-white" id="toggle">
            e-services
        </div>
        <menu class="open">
            <a href="#" class="action">Face</a>
            <a href="#" class="action">Insta</i></a>
            <a href="#" class="action">Whats</a>
            <a href="#" class="action">youtube</i></a>
            <a href="#" class="trigger"><i class="fas fa-plus"></i></a>
        </menu>

    </div>

    <div class="overlay" id="overlay">
        <div style="z-index: 1000;position: relative;">
            <button class="float-right" id="close">close</button>
            <div class="h-full p-12 w-full md:p-32 ">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 justify-center items-center overlay-menu">
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                    <div class="bg-white rounded flex justify-center items-center">100</div>
                </div>
            </div>
        </div>
    </div>







    <script>
        $('#toggle').click(function () {
            $(this).addClass('active');
            $('#overlay').addClass('open');
        });

        $('#close').click(function () {
            $('#toggle').removeClass('active');
            $('#overlay').removeClass('open');
        });

        const trigger = document.querySelector("menu > .trigger");
        trigger.addEventListener('click', (e) => {
            e.currentTarget.parentElement.classList.toggle("open");
        });
    </script>

    <script src="/alpine.js"></script>
</body>

</html>