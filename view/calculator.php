<?php
include 'include/header.php';
?>

  <div class= " content-header " >
       
    
            <h1 class="font-bold ">Quelle est votre empreinte carbone annuelle ?</h1>
    
            <p class="w-1/2 h-full">Notre Outil capture les principaux aspects de l'empreinte carbone selon la méthode du Bilan Carbone®</p>

               
                <a href="">guide</a>

      
    </div>
  
</header>
<main>
<h2>Veuillez saisir vos données ici :</h2>
<div class="flex">


<form action="/calcuator" method="post">   
   <div >
    <h3>Transports :</h3>
    <div>
    <label for="">Kilomètres parcourus en voiture</label>
    <input type="number" placeholder="00.00 Km" name="kmVoiture">
    </div>
    <div>
    <label for="">Kilomètres parcourus en transport en commun</label>
    <input type="number" placeholder="00.00 Km" name="kmTransport">
    </div>
    <div>
    <label for="">Kilomètres parcourus en taxi</label>
    <input type="number" placeholder="00.00 Km" name="kmTaxi">
    </div>
    <div>
    <label for="">Kilomètres parcourus à vélo</label>
    <input type="number" placeholder="00.00 Km" name="kmVelo">
  </div>
</div>

<div>
    
    <h3>Consommation d'énergie :</h3>
    <div>
    <label for="">Facture d'électricité </label>
    <input type="number" placeholder="00.00 DH" name="electricite">
    </div>
    <div>
     <label for="">Facture de gaz </label>
    <input type="number" placeholder="00.00 DH" name="gaz">
     </div>
</div>
<div>
    <h3>Déchets :</h3>
    <div>
    <label for="">Quantité de déchets produits</label>
    <input type="number" placeholder="00.00 Kg" name="dechets">
    </div>
    <div>
    <label for="">Méthodes de gestion des déchets :</label>
    <select name="gestionDechets" id="">
        <option value="">Compostage des déchets organiques</option>
        <option value="">Incinération des déchets</option>

    </select>
    </div>
</div>
<div>
    <h3>Alimentation :</h3>
    <div>
    <label for="">nombre de repas par jour</label>
    <input type="number" name="nbreRepas">
    </div>
    <div>
    <label for="" name="">Type de régime alimentaire</label>
    <input type="radio">Régime alimentaire végétarien <br>
    <input type="radio">Régime alimentaire omnivore <br>
    </div>
    <div>
    <label for="" name="">Origine des aliments</label>
    <input type="radio">Aliments locaux
    <input type="radio">Aliments importés
    </div>

</div>
<div>
 <label for="">Date</label>
 <input type="date" name="date">
</div>
<input type="submit" name="calculer" id="" value="Calculer">
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
