<div class="secondary" id="head"></div>
<div class="container-fluid text-center page_annonce">
	
    <div class="container">
    	<h1 class="thin"><?= $value_announce->title; ?></h1>
    	<h2 class="text-muted" style="margin-top:0px;"><small class="thin"><?= $value_announce->sub_title; ?></small></h2>
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

</div>