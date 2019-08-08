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
