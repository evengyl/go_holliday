<div class="modal fade" id="set_active_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Activation de l'annonce</h4>
            </div>
            <div class="modal-body" style="height:370px;">
                <p class="text-center text-muted"><?= $row_annonce->title ?></p>

                <button data-current-status="<?=($row_annonce->active)?'activate':'desactivate'; ?>" data-toggle="modal" data-id="<?= $row_annonce->id; ?>" class="opt_annonce btn">
                    <small><i class="fa fa-angle-double-right "></i><span></span></small>
                </button>

                <hr>
                <p class="text-center text-muted">Désactiver une annonce permet de l'enlever de la liste des annonces sur le site et sur les moteurs de recherches, pour par exemple la completée ou simplement car vous êtes en pour parler pour une réservation ou tout autre choses qui vous semble important au point de vouloir la désactivée.</p>

                <hr>
                <p class="text-center text-muted">Activer une annonce la rendra active sur le site et sur les moteur de recherche, les client pourront donc la trouver et mettre une offre dessus ou vous poser des questions, poser des avis, et possiblement, la louée.</p>
            </div>
        </div>
    </div>
</div>