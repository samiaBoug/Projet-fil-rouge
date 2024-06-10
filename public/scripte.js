
$(function () {
    // sing up
    $("#formEntreprise").hide();
$(".personne").click(function (){
    $("#formEntreprise").hide();
    $("#formPersonne").show();
});
$(".petiteEntreprise").click(function(){
    $("#formPersonne").hide();
    $("#formEntreprise").show();


})
    //graph
    
    // Définir les données PHP comme variables JavaScript globales pour le graphique mensuel
   
    // Initialiser le graphique mensuel
    var monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Bilan Mensuel',
                data: monthlyData,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Définir les données PHP comme variables JavaScript globales pour le graphique annuel
   
    // Initialiser le graphique annuel
    var annualCtx = document.getElementById('annualChart').getContext('2d');
    new Chart(annualCtx, {
        type: 'line',
        data: {
            labels: annualLabels,
            datasets: [{
                label: 'Bilan Annuel',
                data: annualData,
                fill: false,
                borderColor: 'rgb(192, 75, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Définir les données PHP comme variables JavaScript globales pour le graphique circulaire
   
    // Initialiser le graphique circulaire
    var categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut', // type de graphique circulaire
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Empreinte Carbone par Catégorie',
                data: categoryData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

  });