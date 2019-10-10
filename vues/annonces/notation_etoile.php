  <div class="col-xs-12">
    
    <i style="color:DimGrey;" class="far fa-2x fa-times-circle" id="clear_stars" title="Sans intérêt c'est trop nul"></i>
    <i style="color:DimGrey;" class="star fa-2x far fa-star" id="star_1"></i>
    <i style="color:DimGrey;" class="star fa-2x far fa-star" id="star_2"></i>
    <i style="color:DimGrey;" class="star fa-2x far fa-star" id="star_3"></i>
    <i style="color:DimGrey;" class="star fa-2x far fa-star" id="star_4"></i>
    <i style="color:DimGrey;" class="star fa-2x far fa-star" id="star_5"></i><br>
    <small class="text-muted thin">(Survoler pour sélectionner, crois pour annuler la sélection et vaux 0 étoiles</small>
    <hr>
  </div>

<script>
  /////////////////////////////
 /* Javascript fonctions.js */
/////////////////////////////

$(document).ready(function(){

  // Obtenir id numérique des étoiles au format star_numero
  function idNum(id)
  {
    var id = id.split('_');
    var id = id[1];
    return id;
  }

  // Survol des étoiles
  $('.star').hover(function()
  {
    var id = idNum($(this).attr('id')); // id numérique de l'étoile survolée
    var nbStars = $('.star').length; // Nombre d'étoiles de la classe .star
    var i; // Variable d'incrémentation
    for (i = 1 ; i <= nbStars ; i++)
    {
      if(i <= id) 
        $('#star_'+i).removeClass("far").addClass("fas").css("color", "Gold");	

      else if(i > id)
        $('#star_'+i).removeClass("fas").addClass("far").css("color", "DimGrey");

      if(i == id)
        $('#note').attr({value:i}); // affectation de la note au formulaire
    }
  },function(){});

  // Survol de la croix
  $('#clear_stars').hover(function()
  {
    $('.star').removeClass("fas").addClass("far").css("color", "DimGrey");
    $('#note').attr({value:'0'});
  },function(){});
});
</script>