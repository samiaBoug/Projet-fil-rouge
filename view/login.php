<?php
include 'include/header.php';
?>

 <!-- component -->
<div class="min-h-screen flex items-center justify-center w-full bg-white ">
	<div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
		<h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Bienvenue !</h1>
		<form action="index.php?action=login" method="post" class="formLogin">
			<div class="mb-4">
				<label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
				<input type="email" name="email" id="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"  >
				<div class="erreurs"><?php if (!empty($erreurs)) {
					echo htmlspecialchars($erreurs['email']) ;}  ?></div>
			</div>
			<div class="mb-4">
				<label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Mot de passe</label>
				<input type="password" name="motDePasse" id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"  >
				<div class="erreurs"><?php if (!empty($erreurs['motDePasse'])) {
					echo htmlspecialchars($erreurs['motDePasse']) ;}  ?></div>

				
			</div>
			<div class="flex items-center justify-between mb-4">
				
				<a href="index.php?action=signin"
					class="text-xs text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Creer un compte
					</a>
			</div>
			<div class="relative flex gap-10 min-h-screen flex-col justify-center items-center overflow-hidden bg-gray-50 py-6 sm:py-12">

			</div>
             <input type="submit" value="Se connecter" name="login" class="connxBoutton btn overflow-hidden relative w-64 bg-blue-500 text-white py-4 px-4 rounded-xl font-bold uppercase -- before:block before:absolute before:h-full before:w-1/2 before:rounded-full before:bg-orange-400 before:top-0 before:left-1/4 before:transition-transform before:opacity-0 before:hover:opacity-100 hover:text-orange-200 hover:before:animate-ping transition-all duration-300" >

		</form>
	</div>
</div> 
</header>

<?php
include 'include/footer.php';
?>