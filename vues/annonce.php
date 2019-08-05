<div class="secondary" id="head"></div>
<? affiche($last_announce); ?>
<div class="container-fluid text-center page_annonce">
	
    <div class="container">
    	<h1 class="thin"><?= $last_announce->title; ?></h1>
    	<h2 class="text-muted" style="margin-top:0px;"><small class="thin"><?= $last_announce->sub_title; ?></small></h2>
    </div>
    <div class="slide_annonce">
        <div class="container">
		    <div id="myCarousel" class="carousel slide" data-ride="carousel">
		        <div class="carousel-inner"><?
		        	$active = true;
		        	foreach($slide_img as $row_img)
		        	{?>
						<div class="item <?=($active)?'active':''; ?>">
		                	<center><img src="<?= $row_img; ?>" alt=""  style="max-height:400px;" class="img-responsive"></center>
		            	</div><?
		            	$active = false;
		        	}?>
		        	
		         
		        </div>
		        
		        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left"></span>
		            <span class="sr-only">Previous</span>
		        </a>
		        <a class="right carousel-control" href="#myCarousel" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right"></span>
		            <span class="sr-only">Next</span>
		        </a>
		        
		        <ul class="carousel-indicators"><?
		        	$i = 0;
			        foreach($slide_img as $row_img)
			        {?>
			        	<li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class="active">
			        		<a href="<?= $row_img; ?>" data-lightbox="image-1">
			        			<img src="<?= $row_img; ?>">
			        		</a>
		        		</li><?
			        	$i++;
			        }?>
		        </ul>
		        <hr>
		    </div>
		</div>
    </div>



    <div class="jumbotron" style="margin-top:150px;">
		<div class="container">
			
			<h3 class="text-center thin">Détails</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fab fa-creative-commons-nc-eu"></i>Habitation</h4></div>
					<div class="h-body text-center">
						<p><?= $last_announce->text_habitat ?></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fab fa-creative-commons-nc-eu"></i></i>Gamme de prix</h4></div>
					<div class="h-body text-center">
						<p>Tatata</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fas fa-bicycle"></i>Liste d'activités à proximité</h4></div>
					<div class="h-body text-center">
						<p>Tatata</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fas fa-comments"></i>Liste des sports à proximité</h4></div>
					<div class="h-body text-center">
						<p>Tatata</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fas fa-comments"></i>Ce type de vacances s'adresse particulierement à </h4></div>
					<div class="h-body text-center">
						<p>Tatata</p>
					</div>
				</div>
			</div>
		
		</div>
	</div>

 <div style="width: 100%; height: 480px" id="mapContainer"></div>

</div>


<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>


  <script type="text/javascript">
  	var platform = new H.service.Platform({
  		'apikey': 'lBGB5iFRsQEI2pIltYruHzX1vjcNaFeVJ_4w28nS-OA'
	});


	// Obtain the default map types from the platform object:
	var defaultLayers = platform.createDefaultLayers();

// Instantiate (and display) a map object:
	var map = new H.Map(
  document.getElementById('mapContainer'),
  defaultLayers.raster.normal.map,
  {
    zoom: 15,
    center: { lat: 52.5, lng: 13.4 }
  });


  </script>