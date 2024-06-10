<footer class=" relative pt-8 pb-6 ">
    <div class="container mx-auto px-4 ">
        <div class="flex flex-wrap text-left lg:text-left">
            <div class=" md:flex w-full lg:w-6/12 px-4">

                <div :class="open ? 'hidden':'flex'" class="flex px-6 py-0 w-1/2 items-center 
                          md:w-1/5 md:px-1 md:py-11 md:flex md:items-center " x-transition:enter="transition ease-out duration-300">
                    <a href=""><img src="public/img/logoGreenScore.png" alt="logo" class="h-24 w-auto "></a>
                </div>
                <p class="w-1/2">
                    Chez Green Score, notre mission est de fournir des outils pratiques et des ressources inspirantes pour aider chacun à
                    réduire son empreinte carbone et à prendre des mesures concrètes en faveur de notre planète.
                </p>

               
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="md:flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                        <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Explorer </span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="">Accueil</a>
                            </li>
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="">guide</a>
                            </li>
                          
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 ">
                        <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">A propos de nous</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="">A propos</a>
                            </li>
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="">Conditions d'utilisastion </a>
                            </li>
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="">Politique de confidentialité </a>
                            </li>
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="">Contactez-nous</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Ressources Utiles</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="">ADEME</a>
                            </li>
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="">Site officiel Bilan Carbone</a>
                            </li>
                            <li>
                                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="">Ministère de l'Environnement et du Développement Durable</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-blueGray-500 font-semibold py-1">
                    Copyright © <span id="get-current-year">2024</span><a
                        href=""
                        class="text-blueGray-500 hover:text-gray-800" target="_blank"> Green Score
                      
                </div>
            </div>
        </div>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="charts.js"></script>
</body>

</html>