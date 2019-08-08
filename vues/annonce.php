<div class="secondary" id="head"></div>
<div class="container-fluid text-center page_annonce">
	
    <div class="container">
    	<h1 class="thin" style="margin-top:0px;"><?= ucfirst($last_announce->title); ?></h1>
    	<h2 class="text-muted" style="margin-top:0px;"><small class="thin"><?= ucfirst($last_announce->sub_title); ?></small></h2>
    	<h4 class="text-muted thin" style="margin-top:0px;">
				<?= ucfirst($last_announce->address_lieux_dit).
					" à ".$last_announce->address_zip_code.
					", ".ucfirst($last_announce->address_localite).
					", ".ucfirst($last_announce->address_rue).
					" ".$last_announce->address_numero ?></h4>
    </div>


<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
        <!-- Wrapper for slides -->
        <div class='carousel-inner' style="height:500px;"><?
        	$active = true;
        	foreach($slide_img as $row_img)
        	{?>
				<div class="item <?=($active)?'active':''; ?>">
                	<center><img style="max-height:500px;" src="<?= $row_img; ?>" alt=""></center>
            	</div><?
            	$active = false;
        	}?>
        </div>
            
        <!-- Controls -->
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>
    
    <!-- Indicators -->
    <ol class='carousel-indicators mCustomScrollbar'><?
    	$i = 0;
    	$active = true;
        foreach($slide_img as $row_img)
        {?>
        	<li  data-target="#carousel-custom" data-slide-to="<?= $i; ?>" class="active">
        		<a href="<?= $row_img; ?>" data-lightbox="image-1">
        			<img style="max-height:100px;" src="<?= $row_img; ?>">
        		</a>
    		</li><?
    		$active = false;
        	$i++;
        }?>

    </ol>
</div>




    <div class="jumbotron" style="margin-top:15px;">
		<div class="container">
			
			<h3 class="text-center thin" style="margin-top:0px;">Vacances orientée pour ?</h3>
			<div class="row" style="margin-top:25px;"><? 
				$colonage_type = "col-xs-4";
				$nb_type = count($last_announce->array_type_vacances);

				if($nb_type == 1)
					$colonage_type = "col-xs-4 col-xs-offset-4";
				else if($nb_type == 2)
					$colonage_type = "col-xs-4 col-xs-offset-2";

				foreach($last_announce->array_type_vacances_icon as $key => $row_type)
				{?>
					<div class="<?= $colonage_type ?>">
						<div class="thumbnail" style="padding-top:10px;">
							<?= $row_type; ?>
							<div class="caption">
								<h3 class="text-muted thin" style="margin-top:5px;"><?= $last_announce->array_type_vacances_text[$key]; ?></h3>
							</div>
						</div>
					</div><?
					$colonage_type = "col-xs-4";
				}?>
				<h3 class="text-center thin col-xs-12" style="margin-top:0px;">C'est un bien pour <b><?= $last_announce->max_personn; ?></b> personne(s) maximum</h3>
			</div>
		</div>
	</div>


    <div class="jumbotron" style="margin-top:15px;">
		<div class="container">
			<h3 class="text-center thin" style="margin-top:0px;">Elle vous intéresse ? Vous souhaiter aller plus loin ?</h3>
			<div class="row" style="margin-top:25px;">
				<div class="col-xs-4">
			        <button class="btn btn-danger" <?=(isset($_app->user->login))?"":"disabled"; ?> data-action="place_to_fav" data-id="<?= $last_announce->id_annonce?>">Placer cette annonce dans mes favorites</button>
			    </div>
			    <div class="col-xs-4">
			        <button class="btn btn-info" data-toggle="modal" data-target="#col-xs-4">Faire une demande de dates</button>
			    </div>
			    <div class="col-xs-4">
			        <button class="btn btn-info" data-toggle="modal" data-target="#col-xs-4">Prendre contact avec l'annonceur</button>
			    </div>
			</div>
		</div>
	</div>



    <div class="jumbotron" style="margin-top:15px;">
		<div class="row">
			<h3 class="text-center thin" style="margin-top:0px;">Détails</h3>
			<div class="row" style="margin-top:0px;">
				<div class="col-md-3">
					<div class="h-caption"><h4><i class="fas fa-home"></i>Habitation</h4></div>
					<div class="h-body text-center">
						<img src="/images/habitats/<?= $last_announce->img_habitat ?>">
						<h3 class="text-center" style="margin-top:15px;"><?= $last_announce->name_habitat_human ?></h3>
					</div>
				</div>
				<div class="col-md-3">
					<div class="h-caption"><h4><i class="fas fa-euro-sign"></i>Gamme de prix</h4></div>
					<div class="h-body text-center">
						<p><?= $last_announce->price_one_night_human; ?></p>
						<p><?= $last_announce->price_week_end_human; ?></p>
						<p><?= $last_announce->price_one_week_human; ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="h-caption"><h4><i class="fas fa-child"></i>Liste d'activités à proximité direct</h4></div>
					<div class="h-body text-center"><?
						foreach($last_announce->list_activity_human as $row_activity)
						{
							echo "<p class='text-muted'>". $row_activity ."</p>";
						}?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="h-caption"><h4><i class="fas fa-volleyball-ball"></i>Liste des sports à proximité direct</h4></div>
					<div class="h-body text-center"><?
						foreach($last_announce->list_sport_human as $row_sport)
						{
							echo "<p class='text-muted'>". $row_sport ."</p>";
						}?>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="jumbotron" style="margin-top:15px;">
		<div class="container">
			
			<h3 class="text-center thin" style="margin-top:0px;">Informations pratiques complémentaires</h3>
			<div class="row">
				<div class="col-md-4 highlight">
					<div class="h-caption"><h4><i style="color:<?=($last_announce->handicap)?'#5cb85c':'#d9534f';?>" class="fab fa-accessible-icon"></i>Accès personnes à mobilité réduite</h4></div>
				</div>
				<div class="col-md-4 highlight">
					<div class="h-caption"><h4><i style="color:<?=($last_announce->pet)?'#5cb85c':'#d9534f';?>" class="fas fa-dog"></i>Animaux de compagnie autorisé</h4></div>
				</div>
				<div class="col-md-4 highlight">
					<div class="h-caption"><h4><i style="color:<?=($last_announce->parking)?'#5cb85c':'#d9534f';?>"  class="fas fa-car-side"></i>Parking à proximité immédiate</h4></div>
				</div>
			</div>
		</div>
	</div>


<div class="jumbotron" style="margin-top:15px;">
		<div class="container">
			<h4 class="text-center thin" style="margin-top:0px;"><?= $last_announce->caution_human; ?></h4>
		</div>
	</div>


	


	<div class="jumbotron" style="margin-top:15px;">
		<div class="row">
			<h3 class="text-center thin" style="margin-top:0px;">Où est-ce ?</h3>
			<h4 class="text-center " style="margin-top:0px;"><b>
				<?= ucfirst($last_announce->address_lieux_dit).
					" à ".$last_announce->address_zip_code.
					", ".ucfirst($last_announce->address_localite).
					", ".ucfirst($last_announce->address_rue).
					" ".$last_announce->address_numero ?></b></h4>
			<span class="thin text-muted"><small>Liste non exhaustive de proximité immédiate (5 km)</small></span>
			<span class="thin text-muted"><small>Les cartes Google maps étant devenue payant, nous utilisons un autre fournisseur</small></span>
			<div id="map" style="margin-top:15px; margin-bottom:15px; height:500px;" class="col-xs-10 col-xs-offset-1"></div><hr>
			<h3 class="col-xs-12 text-center thin">Légende de la carte</h3>
			
			<span class="col-xs-3 text-muted thin">
				<ul class="list-group" id="restaurant_map">
					<li class="list-group-item"><img src="/images/markers/marker-icon-blue.png">&nbsp;&nbsp;Restaurant</li>
				</ul>
			</span>
			<span class="col-xs-3 text-muted thin">
				<ul class="list-group" id="bar_map">
					<li class="list-group-item"><img src="/images/markers/marker-icon-green.png">&nbsp;&nbsp;Bar</li>
				</ul>
			</span>
			<span class="col-xs-3 text-muted thin">
				<ul class="list-group" id="supermarche_map">
					<li class="list-group-item"><img src="/images/markers/marker-icon-violet.png">&nbsp;&nbsp;Supermarché</li>
				</ul>
			</span>
			<span class="col-xs-3 text-muted thin">
				<ul class="list-group">
					<li class="list-group-item"><img src="/images/markers/marker-icon-red.png">&nbsp;&nbsp;Position du bien</li>
				</ul>
			</span>
			
		</div>
	</div>
</div><?


	$add_sql = new stdClass();
	$add_sql->rue = $last_announce->address_numero." ".$last_announce->address_rue;
	$add_sql->ville = $last_announce->address_localite;
	$add_sql->code_postal = $last_announce->address_zip_code;
	$add_sql->pays = $last_announce->name_address_pays_sql;
	?>


 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
	   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	   crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
	integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
	crossorigin="">
</script>
<script type="text/javascript" src="https://tiles.unwiredmaps.com/js/leaflet-unwired.js"></script>
<script src="/js/leaflet-color-markers.js"></script>

<script type="text/javascript">

$(document).ready(function()
{
	
	$("button[data-action='place_to_fav']").click(function(){
		var button_clicked = $(this);
		$.ajax({
            type : 'POST',
            url  : '/ajax/controller/fct_annonce_ajax.php',
            dataType : "HTML",
            data : {"app_fct" : "add_to_favorite", "id_annonce" : button_clicked.attr("data-id")},
            success : function(data_return)
            {
            	//button_clicked.attr("disabled", true);
            },
        });
	});
/*
	var url = "https://eu1.locationiq.com/v1/search.php?key=17bb9e209eb39c&q=<?= $add_sql->rue; ?>, <?= $add_sql->ville; ?>,<?= $add_sql->code_postal; ?>, <?= $add_sql->pays;?>&format=json&addressdetails=1&extratags=1";

	var settings_localisation = {
	  "async": true,
	  "crossDomain": true,
	  "url": url,
	  "method": "GET"
	};


	$.ajax(settings_localisation).done(function (response_location) 
	{
		var array_list_interest = [
			"restaurant",
			"pub",
			"supermarket",
		]

		var lat = response_location[0].lat;
		var lon = response_location[0].lon;
		var macarte = L.map('map').setView([lat, lon], 14);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?key=17bb9e209eb39c', {
		    minZoom: 8,
		    maxZoom: 18,
		    attribution : "Search by <a href='https://LocationIQ.com'>LocationIQ.com</a>",
		    zoomControl: false
		}).addTo(macarte);


		//marker de la position enregistrée en php
		marker = new L.marker([lat, lon], {icon: redIcon})
			.bindPopup(response_location[0].display_name)
			.addTo(macarte);


	    L.control.scale().addTo(macarte);
	    

	    for( var i = 0; i < array_list_interest.length; i++)
	    {

	  		(function (i)
		  	{
	    		setTimeout(function ()
		    	{
		      		var url = "https://eu1.locationiq.com/v1/nearby.php?key=17bb9e209eb39c&lat=" + response_location[0].lat + "&lon=" + response_location[0].lon + "&tag="+ array_list_interest[i] +"&radius=5000&format=json";

					var settings_interest_point_ = {
					  	"async": true,
					  	"crossDomain": true,
					  	"url": url,
					  	"method": "GET"
					};

					$.ajax(settings_interest_point_).done(function (response_interest_point) 
					{
						// list des marker que le geocoding a trouver
				        for (var j = 0; j < response_interest_point.length; j++)
				        {
				        	if(response_interest_point[j].tag_type == "restaurant")
				        	{
								marker = new L.marker([response_interest_point[j].lat,response_interest_point[j].lon], {icon : blueIcon})
									.bindPopup("<b>" + response_interest_point[j].tag_type+ "</b> : <i>" +response_interest_point[j].name+ "</i><br> à "+ (response_interest_point[j].distance)/1000+" Km")
									.addTo(macarte);

								$("ul#restaurant_map").append("<li class='list-group-item'><b><i>"+response_interest_point[j].name+"</i></b> - "+(response_interest_point[j].distance)/1000+" Km</li>");
							}

							else if(response_interest_point[j].tag_type == "pub")
				        	{
								marker = new L.marker([response_interest_point[j].lat,response_interest_point[j].lon], {icon : greenIcon})
									.bindPopup("<b>" + response_interest_point[j].tag_type+ "</b> : <i>" +response_interest_point[j].name+ "</i><br> à "+ (response_interest_point[j].distance)/1000+" Km")
									.addTo(macarte);

								$("ul#bar_map").append("<li class='list-group-item'><b><i>"+response_interest_point[j].name+"</i></b> - "+(response_interest_point[j].distance)/1000+" Km</li>");
							}

							
							else if(response_interest_point[j].tag_type == "supermarket")
				        	{
								marker = new L.marker([response_interest_point[j].lat,response_interest_point[j].lon], {icon : violetIcon})
									.bindPopup("<b>" + response_interest_point[j].tag_type+ "</b> : <i>" +response_interest_point[j].name+ "</i><br> à "+ (response_interest_point[j].distance)/1000+" Km")
									.addTo(macarte);

								$("ul#supermarche_map").append("<li class='list-group-item'><b><i>"+response_interest_point[j].name+"</i></b> - "+(response_interest_point[j].distance)/1000+" Km</li>");
							}
						}
					});

		    }, 1000*i);
		  })(i);
		};

	});*/
});
</script>


