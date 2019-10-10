<div class="profil">
    <div class="back_profil">
        <img class="img-responsive" src="/images/background_profil/<?= $_app->user->id_background_profil; ?>.jpg" alt="..."/>
        <div class="in_top_right"><button data-toggle="modal" data-target="#change_back_profil" class="btn" style=""><i class="fa fa-cog"></i></button></div>
    </div>
    
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
    	<h4><?= ucfirst($_app->user->name)." ".ucfirst($_app->user->last_name) ?></h4>
        <h5><?= ucfirst($_app->user->login) ?></h5>
    	<p class="text-muted" ><small>@Type D'utilisateur : <b><?= $_app->can_do_user->text_user_type ?></b></small></p>
    </div>

    <p class="text-muted">
    	<small>@Adresse Email : <b><?= $_app->user->email ?></b></small>
    </p>
    <p class="text-muted">
        @Tel : <b><?= $_app->user->tel ?></b>
    </p>
    <p class="text-muted">
        @Adresse : <b><?= $_app->user->address_numero.", Rue ".ucfirst($_app->user->address_rue)." à ".$_app->user->zip_code." : ".ucfirst($_app->user->address_localite) ?></b>
    </p>

    <hr>
    <div class="block_suivis"><?
        if($_app->can_do_user->view_infos_annonce)
        {?>
            <h4>
                <?= $_app->user->nb_annonces ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-tags"></span><br>
                <small>Annonces crées</small><br>
                <small>Dont <?= $_app->user->nb_annonces_active ?> Active(s)</small>
            </h4><hr>
        
            <h4>
            	<?= $_app->user->nb_vues_total ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span><br>
            	<small>Vues sur le total de vos annonce, actives ou non</small>
            </h4><hr>

            <h4>
                <span style="color:#5cb85c;"><?= $_app->user->total_benefit ?></span>&nbsp;&nbsp;<span class="glyphicon glyphicon-euro"></span><br>
                <small>Bénéfice moyen sur vos réservations</small><br><br>

                <span style="color:#f0ad4e;"><?= $_app->user->total_possible_benefit ?></span>&nbsp;&nbsp;<span class="glyphicon glyphicon-euro"></span><br>
                <small>Bénéfice dormant sur vos demandes</small>
            </h4><hr><?
        }?>
        <h4>
        	<?= $_app->user->total_private_message; ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-comment"></span><br>
            <small>Conversation(s) au total</small><br><br>
            <small>Dont <?= ($_app->user->private_message_not_view != 0)?'<b style="color:red;">'.$_app->user->private_message_not_view.'</b>':'0'; ?> Non lue(s)</small>
        </h4><hr>
    </div>

</div>

     <!-- Modal changement de background profil -->
    <? require($_app->base_dir.'/vues/my_account/my_account_modal_edit_background_profil.php'); ?>