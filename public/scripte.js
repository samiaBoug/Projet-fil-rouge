
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

$('#scroll-icon').click(function() {
    console.log("clicked");
    $('html, body').animate({
      scrollTop: $('#target-section').offset().top
    }, 1000);
  });
  });