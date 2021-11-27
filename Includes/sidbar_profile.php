
<div class="containers m-auto my-20">

<h1 class="text-4xl font-light mb-10"><?php echo $lang["Mon espace citoyen"]?></h1>
<div class="flex flex-col lg:flex-row justify-between">
    <div class="flex flex-col w-full lg:w-96 h-72 bg-white overflow-hidden border-t-4 border-blue-800 rounded-lg shadow-xl">
        <div class="flex items-center justify-between py-5  m-auto">
            <div class="w-10 h-10 rounded-full"><img src="images/avatar.jpg" alt=""></div>
            <h1 class="text-xl uppercase text-blue-800"><?php echo $_SESSION['username'];?></h1>
        </div>
        <ul class="flex flex-col">
            <li class="border-t-2 border-b-2 px-2">
                <a href="profile"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                    <i class="fa fa-th mx-2"></i>
                    <span class="text-sm font-medium"><?php echo $lang['table de bord'];?></span>
                </a>
            </li>
            <li class=" border-b-2 px-2">
                <a href="Profil-details"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                    <i class="fa fa-user mx-2"></i>
                    <span class="text-sm font-medium"><?php echo $lang['profile'];?></span>
                </a>
            </li>
            <li class=" border-b-2 px-2">
                <a href="reclamation"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                    <i class="far fa-envelope mx-2"></i>
                    <span class="text-sm font-medium"><?php echo $lang['Reclamations'];?></span>
                </a>
            </li>
            <li class="  px-2">
                <a href="Logout"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-red-500">
                    <i class="fas fa-sign-out-alt mx-2"></i>
                    <span class="text-sm font-medium"><?php echo $lang['Déconnecter'];?></span>
                </a>
            </li>
        </ul>
    </div>