<div class="modal fade" id="validate_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Valider cette annonce</h4>
            </div>
            <div class="modal-body" style="height:230px;">
                <p class="text-muted text-center">Valider une annonce va permettre de prévenir l'administration qu'une annonce à été crée, elle sera vérifiée pour contrôler la véracité de cette annonce, au besoin vous serez contacté.<br>un mail vous sera envoyé pour vous prévenir que l'annonce à été validée par l'administration<br>Il vous sera ensuite demande de souscrire à tout petit abonement pour la rendre public.</p>
                <hr>
                <btn data-action="validate_annonce" data-id-user="<?= $_app->user->id_utilisateurs ?>" data-id="<?= $row_annonce->id ?>" class="btn btn-warning">OK je valide mon annonce</btn>
                <div class="loading_ajax col-xs-12">
                    <img src="/images/loading.gif">
                </div>
            </div>
        </div>
    </div>
</div>


