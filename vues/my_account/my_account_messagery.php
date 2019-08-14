<h4 class="title">Listes de mes Messages</h4><hr>

<ul class="list-unstyled list_annonces_max"><?
    foreach($message_unread as $row_message)
    {?>
        <li class="message" style="padding-top:15px; ">
            <div class="row" style="padding-left:15px; padding-right:15px; ">
                <div class='col-xs-12' style="background-color: #5cb85c30; padding:15px;">

                    <div class="col-xs-2">
                        <span class="text-muted"><b>De : <?= $row_message->name_sender ?></b></span><br>
                    </div>

                    <div class="col-xs-7">
                        <div class="col-xs-6">
                            <span class="text-muted"><small><b>Pour l'Annonce : <?= $row_message->name_announce ?></b></small></span>

                        </div>
                        <div class="col-xs-6">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <span class="text-muted"><small>Date d'envoi : <?= $row_message->send_date ?></small></span><br>
                    </div>
                    <hr>
                    <div class='col-xs-12' style="text-align:left; background:white; padding:15px;">
                        <span class="text-muted"><small><b>Dernier Message : <?= ($row_message->answer == 0)?'Non répondu':'Répondu';?></b></small></span><br>
                        <hr>
                        <blockquote style="font-size:12px;">
                            <p><?= $row_message->message ?></p>
                            <footer><b><?
                                if($row_message->answer == 0)
                                    echo "De : ". $row_message->name_sender;
                                else
                                    echo "De : ". $_app->user->name." ".$_app->user->last_name;?>
                            </b></footer>
                        </blockquote>

                    </div>
                </div>
            </div>
        </li><?
    }

    foreach($message_read as $row_message)
    {?>
        <li class="message" style="padding-top:15px;">
            <div class="row" style="padding-left:15px; padding-right:15px;">
                <div class='col-xs-12' style="background-color: #f0ad4e30;">

                    <div class="col-xs-2">
                    </div>

                    <div class="col-xs-10">
                        <div class="col-xs-6">
                            <span class="text-muted"><small>Date d'envoi : <?= $row_message->send_date ?></small></span><br>
                            <span class="text-muted"><small>De : <?= $row_message->name_sender ?></small></span><br>
                            <span class="text-muted"><small>Message : <?= $row_message->message ?></small></span><br>
                            <span class="text-muted"><small>iD annonce : <?= $row_message->id_annonce ?></small></span><br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                        </div>
                    </div>
                    <div class="col-xs-10">
                    </div>
                </div>
            </div>
        </li><?
    }?>

</ul>
    


