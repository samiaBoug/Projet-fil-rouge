
$(function () {
    $("#formEntreprise").hide();
$(".personne").click(function (){
    $("#formEntreprise").hide();
    $("#formPersonne").show();
});
$(".petiteEntreprise").click(function(){
    $("#formPersonne").hide();
    $("#formEntreprise").show();


})
  });