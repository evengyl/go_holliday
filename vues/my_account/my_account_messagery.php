<h4 class="title">Listes de mes Messages</h4><hr>

<ul class="list-unstyled list_annonces_max"><?
    foreach($messages as $id_group => $row_messages)
    {
        $row_last_message = $row_messages[0];?>
            <li class="message" style="padding-top:15px;">
                <div class="row" style="padding-left:15px; padding-right:15px; ">
                    <? $bg_color = ($row_last_message->vu == 0)?"#5cb85c30":"#f0ad4e30"; ?>
                    <div class='col-xs-12' style="background-color: <?= $bg_color?>; padding:15px;">

                        <div class="col-xs-2">
                            <span class="text-muted"><b>De : <?= $row_last_message->name_sender ?></b></span><br>
                        </div>

                        <div class="col-xs-7">
                            <div class="col-xs-6">
                                <span class="text-muted"><small><b>Pour l'Annonce : <?= $row_last_message->name_announce ?></b></small></span>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <span class="text-muted"><small>Date d'envoi : <?= $row_last_message->send_date ?></small></span><br>
                        </div>
                        <hr>
                        <div class='col-xs-12' style="text-align:left; background:white; padding:15px;">
                            <span class="text-muted"><small><b>Dernier Message : <?= ($row_last_message->vu == 0)?'Non lu':'Lu';?></b></small></span>
                            <span class="text-muted"><small><b>, <?= ($row_last_message->answer == 0)?'Non répondu':'Répondu';?></b></small></span><br>
                            <hr>
                            <blockquote style="font-size:12px;">
                                <p><?= $row_last_message->message ?></p>
                                <footer><b><?
                                    if($row_last_message->answer == 0)
                                        echo "De : ". $row_last_message->name_sender;
                                    else
                                        echo "De : ". $_app->user->name." ".$_app->user->last_name;?>
                                </b></footer>
                            </blockquote>
                            <button data-toggle="modal" data-target="#message_<?= $row_last_message->id_user_sender ?>" class="btn btn-warning btn-sm" style="padding: 5px 20px;">Ouvrir</button>
                        </div>
                    </div>
                </div>
            </li><?
        require($_app->base_dir.'/vues/my_account/my_account_modal_message.php');
    }?>
</ul>





