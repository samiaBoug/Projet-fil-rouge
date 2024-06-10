<?php
include 'include/header.php';
?>

<div class="content-header">
    <h1 class="font-bold titreHeaderOutil">Quelle est votre empreinte carbone annuelle ?</h1>
    <p class="w-1/2 h-full">Félicitations pour avoir choisi de prendre la responsabilité environnementale ! Le calcul de votre empreinte carbone est le premier pas essentiel pour être capable de diminuer votre impact écologique. Si vous avez besoin d'aide ou de conseils, n'hésitez pas à visiter notre <a href="index.php?action=guide">page guide </a>. </p>
    <svg id="scroll-icon" class="w-6 h-6 text-white cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
</div>

</header>
<main id="target-section">
<h2 style="margin-left : 1rem; font-weight : bolder">Veuillez saisir vos données ici :</h2>
<div class="flex">
<form action="index.php?action=calculeEmprinteCarbone" method="post" class="formOutil">   
   <div class="categorie">
       <h3 class="titreCateg">Transports :</h3>
       <div class="flex">
           <label for="kmVoiture">Kilomètres parcourus en voiture</label>
           <input type="number" placeholder="00.00 Km" name="kmVoiture">
       </div>
       <div class="flex">
           <label for="kmTransport">Kilomètres parcourus en transport en commun</label>
           <input type="number" placeholder="00.00 Km" name="kmTransport">
       </div>
       <div class="flex">
           <label for="kmTaxi">Kilomètres parcourus en taxi</label>
           <input type="number" placeholder="00.00 Km" name="kmTaxi">
       </div>
       <div class="flex">
           <label for="kmVelo">Kilomètres parcourus à vélo</label>
           <input type="number" placeholder="00.00 Km" name="kmVelo">
       </div>
       <div class="erreurs"><?= htmlspecialchars($erreurs['transport']) ?></div>
   </div>

   <div class="categorie">
       <h3 class="titreCateg">Consommation d'énergie :</h3>
       <div class="flex">
           <label for="electricite">Facture d'électricité</label>
           <input type="number" placeholder="00.00 DH" name="electricite">
       </div>
       <div class="flex">
           <label for="gaz">Facture de gaz</label>
           <input type="number" placeholder="00.00 DH" name="gaz">
       </div>
       <div class="erreurs"><?= htmlspecialchars($erreurs['energie']) ?></div>
   </div>

   <div class="categorie">
       <h3 class="titreCateg">Déchets :</h3>
       <div class="flex">
           <label for="dechets">Quantité de déchets produits</label>
           <input type="number" placeholder="00.00 Kg" name="dechets">
       </div>
       <!-- Ajuster si nécessaire selon les données récupérées dans le contrôleur -->
       <!-- <div>
           <label for="gestionDechets">Méthodes de gestion des déchets :</label>
           <select name="gestionDechets" id="gestionDechets">
               <option value="">Compostage des déchets organiques</option>
               <option value="">Incinération des déchets</option>
           </select>
       </div> -->
       <div class="erreurs"><?= htmlspecialchars($erreurs['dechets']) ?></div>
   </div>

   <div class="categorie">
       <h3 class="titreCateg">Alimentation :</h3>
       <div class="flex">
           <label for="nbreRepas">Nombre de repas par jour</label>
           <input type="number" name="nbreRepas">
       </div>
      
       <!-- <div>
           <label for="regimeAlimentaire">Type de régime alimentaire</label>
           <input type="radio" name="regimeAlimentaire" value="vegetarien"> Régime alimentaire végétarien <br>
           <input type="radio" name="regimeAlimentaire" value="omnivore"> Régime alimentaire omnivore <br>
       </div>
       <div>
           <label for="origineAliments">Origine des aliments</label>
           <input type="radio" name="origineAliments" value="locaux"> Aliments locaux
           <input type="radio" name="origineAliments" value="importes"> Aliments importés
       </div> -->
       <div class="erreurs"><?= htmlspecialchars($erreurs['alimentation']) ?></div>
   </div>

   <div class="flex">
       <label for="date">Date :</label>
       <input type="date" name="date">
       <div class="erreurs"><?= htmlspecialchars($erreurs['date']) ?></div>
   </div>
   <input type="submit" name="calculer" value="Calculer" class="connxBoutton">
</form>
<div>
    <img src="public/img/calculator-img1.svg" alt="" class="w-1/2">
    <img src="public/img/calculator-img2.svg" alt="" class="w-1/2 " style="margin-top: 30rem;">
</div>
</div>
</main>

<?php
include 'include/footer.php';
?>
