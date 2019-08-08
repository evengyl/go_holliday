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