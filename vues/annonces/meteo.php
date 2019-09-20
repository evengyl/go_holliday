<div class="jumbotron" style="margin-top:15px;">
	<div class="container">
		<h3 class="text-center thin" style="margin-top:0px;">Météo annoncée dans les 3 jours</h3>
		<div class="row">
			<ilayer>
			    <iframe class="meteo" src="http://www.meteobelgium.be/service/fr/code3day/index.php?code=<?= $annonce->address[0]->address_zip_code; ?>&type=ville"
			    allowtransparency="true" align="center" frameborder="0" width="225" height="150"
			    scrolling="no" marginwidth="0" marginheight="0">
			    </iframe>
			</ilayer>
		</div>
	</div>
</div>