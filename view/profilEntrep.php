<?php
include 'include/header.php';
?>


    </div>
    <div>
        <div>Nom de l’entreprise : </div>
        <div>Secteur d'activité :</div>
        <div>Taille de l'entreprise :</div>
        <div>Localisation :</div>
        <div>Email :</div>

    </div>
</div>
  
</header>
<main>
<h1>Bilan Carbone </h1>
<h2>Empreinte Mensuelle (<?php echo "$month-$year"; ?>): <?php echo $empreinteMensuelle; ?> kg CO2</h2>

<h2>Empreinte Annuelle (<?php echo $year; ?>): <?php echo $empreinteAnnuelle; ?> kg CO2</h2>   
<h3>moyenne nationale annuelle </h3> <span></span><h4>en tonne de CO2 par année</h4>
<h3>moyenne mondiale annuelle </h3><span>4,9</span><h4>en tonne de CO2 par année</h4>
<h2>Bilan de moi </h2>

<h3>Empreinte par Catégorie (<?php echo $year; ?>):</h3>
<canvas id="categoryChart" width="400" height="200"></canvas>
  <script>
        // Définir les données PHP comme variables JavaScript globales
        var categoryLabels = <?php echo json_encode(array_column($empreinteParCategorie, 'nomCategorie')); ?>;
        var categoryData = <?php echo json_encode(array_column($empreinteParCategorie, 'total_categorie')); ?>;
    </script>   
<h2>Bilan mentuel</h2>
<canvas id="categoryChart" width="400" height="200"></canvas>
<h2>Bilan anuel</h2>
<canvas id="categoryChart" width="400" height="200"></canvas>
</main>
<?php
include 'include/footer.php';
?>

