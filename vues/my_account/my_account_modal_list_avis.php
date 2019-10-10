<div class="modal fade" id="view_avis_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Liste des avis sur l'annonces</h4>
            </div>
            <div class="modal-body" style="min-height:100px;"><?
                if(!empty($row_annonce->avis))
                {
                    foreach($row_annonce->avis as $row_avis)
                    {
                        if($row_avis->active == 0) continue;?>
                        <li class="annonce" style="padding-top:15px;">
                            <div class="row" style="padding-left:15px; padding-right:15px;">
                                <div class="col-xs-12">
                                        <b><a href="/Annonces/<?= $row_avis->id?>"><?= $row_annonce->title ?></a></b>
                                        <br>
                                        <span class="text-muted"><small>De : <?= $row_avis->user_name." ".$row_avis->user_last_name ?></small></span><br>
                                        <span class="text-muted"><small>"<?= $row_avis->message ?>"</small></span><br>
                                        <span class="text-muted"><small>Le : <?= $row_avis->create_date ?>"</small></span>
                                        
                                </div><?
                                
                                if($_app->user->level_admin == 3)
                                {?>
                                    <button style="position:absolute; right:25px; padding:3px 7px;" class="btn btn-xs btn-danger" title="Retirer l'avis" data-action="Delete_avis" data-id_avis="<?= $row_avis->id; ?>">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button><?
                                }
                                    
                                $star_max = 5;
                                $full = $row_avis->star;
                                $empty = $star_max - $row_avis->star;
                                while($empty < $star_max)
                                {
                                    echo '
                                    <span style="font-size: 1.5em; color: Gold;">
                                      <i class="fas fa-star"></i>
                                    </span>';

                                    $empty++;
                                }

                                while($full < $star_max)
                                {
                                    echo '
                                    <span style="font-size: 1.5em; color: DimGrey;">
                                        <i class="far fa-star"></i>
                                    </span>';
                                    $full++;
                                }?>
                            </div>
                        </li><?
                    }
                }
                else
                {
                    ?><div class="alert alert-info"><strong>Désolé</strong>, mais n'y aucun avis actuellement sur cette <strong>annonce</strong></div><?
                }?>
            </div>
        </div>
    </div>
</div>



