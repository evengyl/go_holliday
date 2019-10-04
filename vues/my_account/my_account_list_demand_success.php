<h4 class="title">Listes des demandes de réservations de dates approuvées</h4>
<hr>

<ul class="list-unstyled list_annonces_max"><?
    if(!empty($demands_success))
    {
        foreach($demands_success as $row_demand_success)
        {?>
            <div class="col-xs-12">
                <div class="thumbnail">
                    
                    <div class="caption">
                    	<p>
                            <span class="text-muted thin">Réservation pour l'annonce : </span><b><?= $row_demand_success->title; ?></b>
                        </p>
                        <p>
                            <span class="text-muted thin">Date d'arrivée : </span><b><?= $row_demand_success->start_date; ?></b>
                            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <span class="text-muted thin">Date de départ : </span><b><?= $row_demand_success->end_date; ?></b>
                        </p>
                        <hr style="margin-top:5px; margin-bottom:5px;">
                        
                        <p class="text-muted">
                            <span class="glyphicon glyphicon-user"></span>

                            &nbsp;&nbsp;<?= $row_demand_success->name_user." ".$row_demand_success->last_name_user; ?>&nbsp;&nbsp;

                            <button data-toggle="modal" data-target="#send_message_<?= $row_demand_success->id; ?>" style="padding:3px 7px;" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-envelope"></span></button>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <span class="text-muted">Prix approuvé : <?= ($row_demand_success->prix == 0)?"<br>Prenez contact car longue durée": $row_demand_success->prix; ?></span>
                        </p>

                    </div>
                </div>
            </div><?
            $data = new stdclass();
            $data->id = $row_demand_success->id;
            $data->id_user = $row_demand_success->id_utilisateurs;
            ?>__MOD2_messagery("id_annonce=<?= $data->id; ?>","id_receiver=<?= $data->id_user; ?>","specific_id_modal=<?= $row_demand_success->id; ?>")__<?
        }
    }?>
</ul>



