<?php
include 'include/header.php';
?>

<div class="content-header">
    <h1 class="font-bold">Quelle est votre empreinte carbone annuelle ?</h1>
    <p class="w-1/2 h-full">Notre outil capture les principaux aspects de l'empreinte carbone selon la méthode du Bilan Carbone®</p>
    <a href="">guide</a>
</div>

</header>
<main>
<h2>Veuillez saisir vos données ici :</h2>
<div class="flex">
<form action="index.php?action=calculeEmprinteCarbone" method="post">   
   <div>
       <h3>Transports :</h3>
       <div>
           <label for="kmVoiture">Kilomètres parcourus en voiture</label>
           <input type="number" placeholder="00.00 Km" name="kmVoiture">
       </div>
       <div>
           <label for="kmTransport">Kilomètres parcourus en transport en commun</label>
           <input type="number" placeholder="00.00 Km" name="kmTransport">
       </div>
       <div>
           <label for="kmTaxi">Kilomètres parcourus en taxi</label>
           <input type="number" placeholder="00.00 Km" name="kmTaxi">
       </div>
       <div>
           <label for="kmVelo">Kilomètres parcourus à vélo</label>
           <input type="number" placeholder="00.00 Km" name="kmVelo">
       </div>
       <div class="erreurs"><?= htmlspecialchars($erreurs['transport']) ?></div>
   </div>

   <div>
       <h3>Consommation d'énergie :</h3>
       <div>
           <label for="electricite">Facture d'électricité</label>
           <input type="number" placeholder="00.00 DH" name="electricite">
       </div>
       <div>
           <label for="gaz">Facture de gaz</label>
           <input type="number" placeholder="00.00 DH" name="gaz">
       </div>
       <div class="erreurs"><?= htmlspecialchars($erreurs['energie']) ?></div>
   </div>

   <div>
       <h3>Déchets :</h3>
       <div>
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

   <div>
       <h3>Alimentation :</h3>
       <div>
           <label for="nbreRepas">Nombre de repas par jour</label>
           <input type="number" name="nbreRepas">
       </div>
       <!-- Ajuster si nécessaire selon les données récupérées dans le contrôleur -->
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

   <div>
       <label for="date">Date</label>
       <input type="date" name="date">
       <div class="erreurs"><?= htmlspecialchars($erreurs['date']) ?></div>
   </div>
   <input type="submit" name="calculer" value="Calculer">
</form>
<div>
    <img src="../public/img/calculator-img1.svg" alt="" class="w-1/2">
    <img src="../public/img/calculator-img2.svg" alt="" class="w-1/2">
</div>
</div>
</main>

<?php
include 'include/footer.php';
?>
