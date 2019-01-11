<div class="modal fade" id="change_back_profil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Changement du fond d'écran du profil</h4>
                <p class="text-muted">Cliquez sur le nouveau fond pour l'activer</p>
            </div>
            <div class="modal-body" style="height:540px;"><?
                foreach($img_back_profil as $row_img)
                {?>
                    <form method="POST" action="#">
                        <div class="col-xs-4" style="height:130px;">
                            <input type="hidden" name="id_img_selected" value="<?= $row_img ?>">
                            <button type="submit" class="thumbnail">
                                <img src='/images/background_profil/<?= $row_img ?>.jpg' class='img-responsive img_modal_back_profil'>
                            </button>
                        </div>
                    </form><?
                }?>
            </div>
        </div>
    </div>
</div>