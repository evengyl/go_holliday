<div class="modal fade" id="view_avis_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Liste des avis sur l'annonces</h4>
            </div>
            <div class="modal-body" style="height:100px;">
                <p class="text-center text-muted">Blabla pas encore fait avis , id annonce : <?= $row_annonce->id ?></p>
            </div>
        </div>
    </div>
</div>