<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/style.css">
    <script src="../public/jquery-3.7.1.min.js"></script>
    <script src="../public/scripte.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

<header class="min-w-740">
    <nav x-data="{ open: false }" class="flex h-auto w-auto  rounded-lg justify-between">
        <div class="flex w-full justify-between ">
            <div :class="open ? 'hidden':'flex'" class="flex px-6 py-0 w-1/2 items-center 
          md:w-1/5 md:px-1 md:py-11 md:flex md:items-center "
                x-transition:enter="transition ease-out duration-300">
                <a href=""><img src="../public/img/logoGreenScore.png" alt="logo" class="h-24 w-auto "></a>
            </div>

            <div x-show="open" x-transition:enter="transition ease-in-out duration-300" class="flex flex-col w-full h-auto
          md:hidden">
                <div class="flex flex-col items-center justify-center gap-2">
                    <a href="index.php?action=guide">Guide</a>
                    <a href="index.php?action=calculator">Outil de calcul</a>
                    <a href="index.php?action=aboutUs">A propos</a>
                    <a href="index.php?action=contact">Contactez-nous</a>
                    <a href="index.php?action=login">Login</a>
                    <a href="signin">Sign Up</a>
                </div>
            </div>
            <div class="hidden w-3/5 items-center justify-evenly font-semibold md:flex">
                <a href="index.php?action=guide">Guide</a>
                <a href="index.php?action=calculator">Outil de calcul</a>
                <a href="index.php?action=aboutUs">A propos</a>
                <a href="index.php?action=contact">Contactez-nous</a>
            <div class="flex justify-center h-screen">
                <div x-data="{ dropdownOpen: true }" class="relative my-32">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="relative z-10 block rounded-md  p-2 focus:outline-none">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zM6.023 15.416C7.491 17.606 9.695 19 12.16 19c2.464 0 4.669-1.393 6.136-3.584A8.968 8.968 0 0 0 12.16 13a8.968 8.968 0 0 0-6.137 2.416zM12 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                    </path>
                                </g>
                            </g>
                        </svg>
            
                    </button>
            
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
            
                    <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 rounded-md shadow-xl z-20">
                        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            profil
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            patamètres
                        </a>
                        <hr>
                        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            Deconnexion
                        </a>
                    </div>
                </div>
            </div>

            </div>
            <div class="hidden w-1/5 items-center justify-evenly font-semibold
          md:flex">
                <a href="index.php?action=login">Login</a>
                <a href="index.php?action=signin">Sign Up</a>
            </div>
            <button class="text-gray-500 w-10 h-10 relative focus:outline-none 
                          md:hidden
                        " @click="open = !open">
                <span class="sr-only">Open main menu</span>
                <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                    <span aria-hidden="true"
                        class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                        :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                    <span aria-hidden="true"
                        class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out"
                        :class="{'opacity-0': open } "></span>
                    <span aria-hidden="true"
                        class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out"
                        :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                </div>
            </button>
        </div>
    </nav>
   
   