<div style="text-align: center; text-transform: none; margin-top: -65px;">
	<div class="content-image-profil">
        <span><?
        if($_app->user->genre == "Monsieur")
            echo '<i class="fas fa-chess-king" style="color:#318cdd;"></i>';
        else if($_app->user->genre == "Madame" || $_app->user->genre == "Mademoiselle")
            echo '<i class="fas fa-chess-queen" style="color:#ff6ca3;"></i>';
        else
            echo '<i class="fas fa-chess-rook" style="color:#9c7ccf;"></i>';?>
    	</span>
    </div>
	<h4><?= $infos_user->last_name." ".$infos_user->name ?></h4>
	<p class="text-muted" ><small>@Type D'utilisateur : <b><?= $_app->can_do_user->text_user_type ?></b></small></p>
</div>

<p class="text-muted">
	<small>@Adresse Email : <b><?= $infos_user->email ?></b></small>
</p>
<p class="text-muted">
    @Tel : <b><?= $infos_user->tel ?></b>
</p>
<p class="text-muted">
    @Adresse : <b><?= $infos_user->address_numero.", Rue ".$infos_user->address_rue." à ".$infos_user->zip_code." : ".$infos_user->address_localite ?></b>
</p>
<hr>
<div class="block_suivis">
    <h4>
    	<?= $infos_user->nb_annonces ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-tags"></span><br>
		<small>Annonces crées</small><br>
        <small>Dont <?= $infos_user->nb_annonces_active ?> Active(s)&nbsp;&nbsp;et&nbsp;&nbsp;<?= $infos_user->nb_annonces_inactive ?> Inactive(s)</small>
	</h4><hr>
    <h4>
    	<?= $infos_user->nb_vues_total ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span><br>
    	<small>Vues sur le total de vos annonce, actives ou non</small>
    </h4><hr>
    <h4>
    	<?= $infos_user->total_private_message; ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-comment"></span><br>
    	<small>Message(s) au total</small><br>
        <small>Dont <?= $infos_user->private_message_not_view; ?> Non lu(s)</small>
    </h4><hr>
</div>
