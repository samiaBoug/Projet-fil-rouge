<?php include 'include/header.php'; ?>

<div class="bg-white border border-solid">
    <div>
        <img src="" alt="" class="border border-solid rounded-10 w-5">
    </div>
    <div>
        <div>Nom : <?= $nom ?> </div>
        <div>Prénom : <?= $prenom ?></div>
    </div>
</div>

<main>
    <h1>Bilan Carbone</h1>
    <h2>Empreinte Mensuelle (<?php echo "$mois-$annee"; ?>): <?php echo $empreinteMensuelle; ?> kg CO2</h2>
    <h2>Empreinte Annuelle (<?php echo $annee; ?>): <?php echo $empreinteAnnuelle; ?> kg CO2</h2>
  <script>
     var monthlyLabels = <?php echo json_encode(array_column($monthlyData, 'label')); ?>;
    var monthlyData = <?php echo json_encode(array_column($monthlyData, 'value')); ?>;


     var annualLabels = <?php echo json_encode(array_column($annualData, 'label')); ?>;
    var annualData = <?php echo json_encode(array_column($annualData, 'value')); ?>;
    
 var categoryLabels = <?php echo json_encode(array_column($empreinteParCategorie, 'nomCategorie')); ?>;
    var categoryData = <?php echo json_encode(array_column($empreinteParCategorie, 'total_categorie')); ?>;

  </script>
    <h3>Bilan Mensuel</h3>
    <canvas id="monthlyChart" width="400" height="200"></canvas>

    <h3>Bilan Annuel</h3>
    <canvas id="annualChart" width="400" height="200"></canvas>

    <h3>Empreinte par Catégorie (<?php echo $annee; ?>):</h3>
    <canvas id="categoryChart" width="400" height="200"></canvas>
</main>

<?php include 'include/footer.php'; ?>
<script src="charts.js"></script>
