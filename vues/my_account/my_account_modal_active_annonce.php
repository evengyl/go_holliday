<div class="modal fade" id="set_active_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mise en ligne de l'annonce</h4>
            </div>
            <div class="modal-body" style="height:300px;">
                <p class="text-center text-muted"><?= $row_annonce->title ?></p>

                <button data-action="activate_annonce" data-id="<?= $row_annonce->id; ?>" class="btn btn-lg btn-success">
                    <small><span style="font-size:24px;" class="glyphicon glyphicon-off"></span></small>
                </button>
                <div class="loading_ajax col-xs-12">
                    <img src="/images/loading.gif">
                </div>
                <hr>
                <p class="text-center text-muted"><strong>Dans un premier temps, <?= $_app->site_name?> étant dans sa phase de lancement, la mise en ligne des annonces est gratuite !!!</strong></p>
                <p class="text-center text-muted">Activer une annonce la rendra active sur le site et sur les moteur de recherche, les client pourront donc la trouver et mettre une offre dessus ou vous poser des questions, poser des avis, et possiblement, la louer.</p>
            </div>
        </div>
    </div>
</div>


