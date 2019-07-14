<div class="secondary" id="head"></div>
<div class="container-fluid text-center page_annonce">
	

    <div class="slide_annonce">
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
		        <hr>
		    </div>
		</div>
    </div>
    <div class="container" style="margin-top:100px;">
    	<h2 class="thin">Toutes les informations sur : <?= $name_annonce; ?></h2>
    </div>
</div>