<div class="jumbotron" style="margin-top:15px;">
	<div class="row">
		<h3 class="text-center thin" style="margin-top:0px;">Où est-ce ?</h3>
		<h4 class="text-center " style="margin-top:0px;"><b>
			<?= ucfirst($annonce->address[0]->address_lieux_dit).
				" à ".$annonce->address[0]->address_zip_code.
				", ".ucfirst($annonce->address[0]->address_localite).
				", ".ucfirst($annonce->address[0]->address_rue).
				" ".$annonce->address[0]->address_numero ?></b></h4>
		<span class="thin text-muted"><small>Liste non exhaustive de proximité immédiate (5 km)</small></span>
		<span class="thin text-muted"><small>Les cartes Google maps étant devenue payant, nous utilisons un autre fournisseur</small></span>
		<div id="map" style="margin-top:15px; margin-bottom:15px; height:500px;" class="col-xs-10 col-xs-offset-1"></div><hr>
		<h3 class="col-xs-12 text-center thin">Légende de la carte</h3>
		


		


		<span class="col-xs-3 text-muted thin">
			<ul class="list-group" id="restaurant_map">
				<a role="button" data-toggle="collapse" href="#collapseRestaurant" aria-expanded="false" aria-controls="collapseRestaurant">
					<li class="list-group-item"><img src="/images/markers/marker-icon-blue.png">&nbsp;&nbsp;Restaurant<br><small class="thin text-muted">(Cliquer pour dérouler)</small></li>
				</a>
				<div class="collapse" id="collapseRestaurant">
					<div class="well">
					</div>
				</div>
			</ul>
		</span>
		<span class="col-xs-3 text-muted thin">
			<ul class="list-group" id="bar_map">
				<a role="button" data-toggle="collapse" href="#collapseBar" aria-expanded="false" aria-controls="collapseBar">
					<li class="list-group-item"><img src="/images/markers/marker-icon-green.png">&nbsp;&nbsp;Bar<br><small class="thin text-muted">(Cliquer pour dérouler)</small></li>
				</a>
				<div class="collapse" id="collapseBar">
					<div class="well">
					</div>
				</div>
				
			</ul>
		</span>
		<span class="col-xs-3 text-muted thin">
			<ul class="list-group" id="supermarche_map">
				<a role="button" data-toggle="collapse" href="#collapseSupermarché" aria-expanded="false" aria-controls="collapseSupermarché">
					<li class="list-group-item"><img src="/images/markers/marker-icon-violet.png">&nbsp;&nbsp;Supermarché<br><small class="thin text-muted">(Cliquer pour dérouler)</small></li>
				</a>
				<div class="collapse" id="collapseSupermarché">
					<div class="well">
					</div>
				</div>
			</ul>
		</span>
		<span class="col-xs-3 text-muted thin">
			<ul class="list-group">
				<li class="list-group-item"><img src="/images/markers/marker-icon-red.png">&nbsp;&nbsp;Position du bien</li>
			</ul>
		</span>
		
	</div>
</div>



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


	var url = "https://eu1.locationiq.com/v1/search.php?key=17bb9e209eb39c&q=<?= $annonce->address[0]->address_rue; ?>, <?= $annonce->address[0]->address_localite; ?>,<?= $annonce->address[0]->address_zip_code; ?>, <?= $annonce->pays_name_human;?>&format=json&addressdetails=1&extratags=1";

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

								$("ul#restaurant_map div.well").append("<li class='list-group-item'><b><i>"+response_interest_point[j].name+"</i></b> - "+(response_interest_point[j].distance)/1000+" Km</li>");
							}

							else if(response_interest_point[j].tag_type == "pub")
				        	{
								marker = new L.marker([response_interest_point[j].lat,response_interest_point[j].lon], {icon : greenIcon})
									.bindPopup("<b>" + response_interest_point[j].tag_type+ "</b> : <i>" +response_interest_point[j].name+ "</i><br> à "+ (response_interest_point[j].distance)/1000+" Km")
									.addTo(macarte);

								$("ul#bar_map div.well").append("<li class='list-group-item'><b><i>"+response_interest_point[j].name+"</i></b> - "+(response_interest_point[j].distance)/1000+" Km</li>");
							}

							
							else if(response_interest_point[j].tag_type == "supermarket")
				        	{
								marker = new L.marker([response_interest_point[j].lat,response_interest_point[j].lon], {icon : violetIcon})
									.bindPopup("<b>" + response_interest_point[j].tag_type+ "</b> : <i>" +response_interest_point[j].name+ "</i><br> à "+ (response_interest_point[j].distance)/1000+" Km")
									.addTo(macarte);

								$("ul#supermarche_map div.well").append("<li class='list-group-item'><b><i>"+response_interest_point[j].name+"</i></b> - "+(response_interest_point[j].distance)/1000+" Km</li>");
							}
						}
					});

		    }, 1000*i);
		  })(i);
		};

	});
});
</script>
