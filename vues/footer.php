<footer id="footer" class="top-space">
	<div class="footer1">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 widget">
					<h3 class="widget-title">__TRANS__contact_detail__</h3>
					<div class="widget-body">
						<p>
							Email de contact : <a href="mailto:perroquet484@matedex.be">Holliday simply online</a><br>
							<br>
							<b>__TRANS_tel_mainteance__ : </b> +32 (0)497 31 25 23<br>
							<b>__TRANS_tel_commercial__ : </b> +32 (0)468 36 17 82<br>
						</p>	
						<!--
						<div class="hidden-xs col-sm-2" id="" style="color:white;">
							<?=($_SESSION['lang'] == 'fr')?'':'<a class="col-lg-2" href="'.$_SERVER["REQUEST_URI"].'&lang=fr"><img class="img-responsive" style="height:25px;" src ="/images/fr.png"></a>'; ?>
							<?=($_SESSION['lang'] == 'en')?'':'<a class="col-lg-2" href="'.$_SERVER["REQUEST_URI"].'&lang=en"><img class="img-responsive" style="height:25px;" src ="/images/en.png"></a>'; ?>
							<?=($_SESSION['lang'] == 'nl')?'':'<a class="col-lg-2" href="'.$_SERVER["REQUEST_URI"].'&lang=nl"><img class="img-responsive" style="height:25px;" src ="/images/nl.png"></a>'; ?>
						</div>-->
					</div>
				</div>

				<div class="col-lg-3 widget">
					<h3 class="widget-title">Suivez-nous sur facebook</h3>
					<div class="widget-body">
						<p class="follow-me-icons">
							<a href=""><i class="fa fa-facebook fa-2"></i></a>
						</p>	
					</div>
				</div>

				<div class="col-lg-5 widget">
					<h3 class="widget-title">ici texte description</h3>
					<div class="widget-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
						<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer2">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 widget">
					<div class="widget-body">
						<p class="simplenav">
							<a href="#">Acceuil</a> | 
							<b><a href="#">Contact</a></b>
						</p>
					</div>
				</div>

				<div class="col-lg-6 widget">
					<div class="widget-body">
						<p class="text-right">
							<p><?php echo Config::$footer_text." - ".date('Y'); ?> __TRANS_footer_price__.</p>
						</p>
					</div>
				</div><?
				if(Config::$is_connect && $_app->user->level >= 3)
                {?>
					<div class="col-xs-12 widget">
						<div class="widget-body" style="text-align:center; margin-top:15px; font-size:15px;"><?
	                        $active = "";
	                        if($_GET['page'] == 'admin')
	                            $active = "active";
	                        echo '<a href="/admin">Administration</a>';?>
		                </div>
		            </div><?
		        }?>
			</div>
		</div>
	</div>
</footer>	


