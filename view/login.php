<?php
include 'include/header.php';
?>

 <!-- component -->
<div class="min-h-screen flex items-center justify-center w-full bg-white ">
	<div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
		<h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Bienvenue !</h1>
		<form action="index.php?action=login" method="post">
			<div class="mb-4">
				<label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
				<input type="email" name="email" id="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"  >
				<div style="color:brown"><?php if (!empty($erreurs)) {
					echo htmlspecialchars($erreurs['email']) ;}  ?></div>
			</div>
			<div class="mb-4">
				<label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Mot de passe</label>
				<input type="password" name="motDePasse" id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"  >
				<div style="color:brown"><?php if (!empty($erreurs['motDePasse'])) {
					echo htmlspecialchars($erreurs['motDePasse']) ;}  ?></div>

				
			</div>
			<div class="flex items-center justify-between mb-4">
				
				<a href="index.php?action=signin"
					class="text-xs text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Creer un compte
					</a>
			</div>
			<!-- Lorsque survolé -->
             <input type="submit" value="Se connecter" name="login" class="bg-blue border-1" style="background-color: blue; border-color: blue; color: white; cursor: pointer;" onmouseover="this.style.backgroundColor='red'; this.style.borderColor='red';" onmouseout="this.style.backgroundColor='blue'; this.style.borderColor='blue';">

		</form>
	</div>
</div> 
</header>

<?php
include 'include/footer.php';
?>