<div class="col-xs-12" style="border-bottom:1px solid #eeeeee; margin-bottom:10px; margin-top:10px;"><?
    if(!empty($row_annonce->date_annonces))
    {?>
        <hr style="margin-top:5px; margin-bottom:5px;">
        <h4 class="thin text-muted">
            Demande en attente de réaction de votre part
        </h4>
        <hr style="margin-top:5px; margin-bottom:5px;">
        
        <div class="loading_ajax col-xs-12" data-id_demand="<?= $row_demand->id; ?>">
            <img src="/images/loading.gif">
        </div><?

        foreach($row_annonce->date_annonces as $row_demand)
        {?>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                    
                    <div class="caption">
                        <p>
                            <span class="text-muted thin">Date d'arrivée : </span><b><?= $row_demand->start_date; ?></b>
                            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <span class="text-muted thin">Date de départ : </span><b><?= $row_demand->end_date; ?></b>
                        </p>
                        <hr style="margin-top:5px; margin-bottom:5px;">
                        
                        <p class="text-muted">
                            <span class="glyphicon glyphicon-user"></span>

                            &nbsp;&nbsp;<?= $row_demand->name_user." ".$row_demand->last_name_user; ?>&nbsp;&nbsp;

                            <button data-toggle="modal" data-target="#send_message_<?= $row_demand->id; ?>" style="padding:3px 7px;" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-envelope"></span></button>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <button data-action='accept_demand_dates' data-id_demand="<?= $row_demand->id; ?>" style="padding:3px 7px;" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok"></span></button>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <button data-action='refuse_demand_dates' data-id_demand="<?= $row_demand->id; ?>" style="padding:3px 7px;" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <hr style="margin-top:5px; margin-bottom:5px;">

                            <span class="text-muted">Prix moyen estimé : <?= ($row_demand->prix == 0)?"<br>Prenez contact car longue durée": $row_demand->prix; ?></span>
                        </p>

                    </div>
                </div>
            </div><?
            $data = new stdclass();
            $data->id = $row_annonce->id;
            $data->id_user = $row_demand->id_utilisateurs;
            ?>__MOD2_messagery("id_annonce=<?= $data->id; ?>","id_receiver=<?= $data->id_user; ?>","specific_id_modal=<?= $row_demand->id; ?>")__<?
        }
    }?> 
</div> 
