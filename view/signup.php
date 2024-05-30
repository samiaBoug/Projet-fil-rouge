<?php
include 'include/header.php';
?>

 <!-- component -->

        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                    Creer votre compte .
                </h1>

                <div class="mt-6">
                    <h1 class="text-gray-500 dark:text-gray-300">Vous etes ?</h1>

                    <div class="mt-3 md:flex md:items-center md:-mx-2">
                        <button class="petiteEntreprise flex justify-center w-full px-6 py-3 text-white bg-blue-500 rounded-md md:w-auto md:mx-2 focus:outline-none " >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5 h-1/5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>

                            <span class="mx-2">
                            Petite entreprise
                            </span>
                        </button>

                        <button class="personne " >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5 h-1/5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                            <span class="mx-2 ">
                               Personne
                            </span>
                        </button>
                    </div>
                </div>
                </header>

                <form class="" id="formPersonne" method="post" action="index.php?action=signup">
    <div>
        <label class="">Nom</label>
        <input type="text" placeholder="" name="nom" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
        <div class="erreurs"><?php if(isset($erreurs['nom'])) { echo htmlspecialchars($erreurs['nom']); } ?></div>
    </div>

    <div>
        <label class="">Prenom</label>
        <input type="text" name="prenom" placeholder="" class="" />
        <div class="erreurs"><?php if(isset($erreurs['prenom'])) { echo htmlspecialchars($erreurs['prenom']); } ?></div>
    </div>

    <div>
        <label class="">Email </label>
        <input type="email" placeholder="" name="email" class="" />
        <div class="erreurs"><?php if(isset($erreurs['email'])) { echo htmlspecialchars($erreurs['email']); } ?></div>
    </div>

    <div>
        <label class="">Mot de passe</label>
        <input type="password" placeholder="" name="motDePasse" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
        <div class="erreurs"><?php if(isset($erreurs['motDePasse'])) { echo htmlspecialchars($erreurs['motDePasse']); } ?></div>
    </div>

    <div>
        <label class="">Repeter mot de passe</label>
        <input type="password" name="confirmerMotDePasse" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
        <div class="erreurs"><?php if(isset($erreurs['confirmerMotDePasse'])) { echo htmlspecialchars($erreurs['confirmerMotDePasse']); } ?></div>
    </div>

    <button type="submit" name="signUpUtilis" class="">
        <span>S'inscrire</span>
    </button>
</form>

                
    <form class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" id="formEntreprise" method="post" action="index.php?action=signup">
        <div>
            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Nom de l'entreprise</label>
            <input type="text" name="nom" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
            <div class="erreurs"><?= htmlspecialchars($erreurs['nom']) ?></div>
        </div>

        <div>
            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Secteur d'activite</label>
            <input type="text" name="secteur" placeholder="" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
            <div class="erreurs"><?= htmlspecialchars($erreurs['secteur']) ?></div>
            
        </div>

            <div>
            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Taille de l'entreprise </label>
            <input type="number" name="taille" placeholder="" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
            <div class="erreurs"><?= htmlspecialchars($erreurs['taille']) ?></div>
            
        </div>
            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Adresse </label>
                <input type="text" name="adresse" placeholder="johnsnow@example.com" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                <div class="erreurs"><?= htmlspecialchars($erreurs['adresse']) ?></div>
            </div>
            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email </label>
                <input type="email" name="email" placeholder="johnsnow@example.com" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                <div class="erreurs"><?= htmlspecialchars($erreurs['email']) ?></div>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Mot de passe</label>
                <input type="password" name="motDePasse" placeholder="" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                <div class="erreurs"><?= htmlspecialchars($erreurs['motDePasse']) ?></div>  
            </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Repeter mot de passe</label>
                        <input type="password" name="confirmerMotDePasse" placeholder="" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        <div class="erreurs"><?= htmlspecialchars($erreurs['confirmerMotDePasse']) ?></div>  
                    
                    </div>

                    <button type="submit" name="signUpEntrep"
                        class="flex items-center justify-between  px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        <span>S'inscrire </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
   



<?php
include 'include/footer.php';
?>

