<div class="modal fade" id="set_desactive_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Retrait de l'annonce</h4>
            </div>
            <div class="modal-body" style="height:250px;">
                <p class="text-center text-muted"><?= $row_annonce->title ?></p>

                <button data-action="desactivate_annonce" data-id="<?= $row_annonce->id; ?>" class="btn btn-lg btn-danger">
                    <small><span style="font-size:24px;" class="glyphicon glyphicon-off"></span></small>
                </button>
                <div class="loading_ajax col-xs-12">
                    <img src="/images/loading.gif">
                </div>
                <hr>
                <p class="text-center text-muted">Attention, en désactivant votre annonce de sa mise en ligne, elle sera considérée comme inactive et donc; n'apparaitra plus en ligne et le prix payer pour la mettre en ligne ne vous sera pas remboursé</p>
            </div>
        </div>
    </div>
</div>


