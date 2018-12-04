<header id="head" class="secondary"></header>
<div class="container text-center">
	<h2 class="thin">Toutes les informations sur : <?= $name_annonce; ?></h2>

    <div class="row slide_annonce">
        <div class="container">
		    <div id="myCarousel" class="carousel slide" data-ride="carousel">
		        <div class="carousel-inner"><?
		        	$active = true;
		        	foreach($slide_img as $row_img)
		        	{?>
						<div class="item <?=($active)?'active':''; ?>" style="max-height:450px;">
		                	<img src="<?= $row_img; ?>" alt="Los Angeles" class="img-responsive">
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
			        {
			        	?><li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class="active"><img src="<?= $row_img; ?>"></li><?
			        	$i++;
			        }?>
		        </ul>
		    </div>
		</div>
    </div>


    <div class="jumbotron top-space" style="margin-top: 130px;">
		<div class="container">
			
			<h3 class="text-center thin">Pourquoi passez par <?= $_app->site_name; ?> ?</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fab fa-creative-commons-nc-eu"></i>Facile et gratuit</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque aliquid adipisci aspernatur. Soluta quisquam dignissimos earum quasi voluptate. Amet, dignissimos, tenetur vitae dolor quam iusto assumenda hic reprehenderit?</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fas fa-cogs"></i></i>Interface de gestion</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, commodi, sequi quis ad fugit omnis cumque a libero error nesciunt molestiae repellat quos perferendis numquam quibusdam rerum repellendus laboriosam reprehenderit! </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fas fa-bicycle"></i>Images, avis, liste d'activités</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, vitae, perferendis, perspiciatis nobis voluptate quod illum soluta minima ipsam ratione quia numquam eveniet eum reprehenderit dolorem dicta nesciunt corporis?</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fas fa-comments"></i>Contact direct avec le propriétaire</h4></div>
					<div class="h-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, excepturi, maiores, dolorem quasi reprehenderit illo accusamus nulla minima repudiandae quas ducimus reiciendis odio sequi atque temporibus facere corporis eos expedita? </p>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>