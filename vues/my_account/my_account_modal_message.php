<div class="modal fade" id="message_<?= $row_last_message->id_user_sender ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Conversation avec <?= $row_last_message->name_sender; ?></h4>
            </div>
            <div class="modal-body">
                <div class="zone_message" style="height:600px; overflow: scroll; padding-left:50px; padding-right:50px;">
                    <?
                    $row_messages = array_reverse($row_messages);
                    foreach($row_messages as $row_message)
                    {
                        if($row_message->id_user_sender == $_app->user->id)
                        {?>
                            
                            <div class="col-xs-8 col-xs-offset-4" style="padding:10px; background-color:#5cb85c30; margin-bottom:15px;">
                                <p class='col-xs-10'>
                                    <?= $row_message->message; ?>
                                    <small class="thin text-muted">à <?= $row_message->time; ?></small>
                                </p>
                                <p class="col-xs-2">
                                    <i style="position:absolute; right:0px; color: #5bc0de;" class="fa-3x far fa-sun"></i>
                                </p>
                            </div><?
                            
                        }
                        else
                        {?>
                            <div class="col-xs-8" style="padding:10px; background-color:#f0ad4e30;  margin-bottom:15px;">
                                <p class="col-xs-2">
                                    <i style="position:absolute; left:0px; color: #5bc0de;" class="fa-3x far fa-grin-stars"></i>
                                </p>
                                <p class='col-xs-10'>
                                    <?= $row_message->message; ?>
                                    <small class="thin text-muted">à <?= $row_message->time; ?></small>
                                </p>
                            </div><?
                        }
                    }?>
                </div>
                <div class="modal-footer">
                    <textarea rows="3" name="message" class="form-control"></textarea>
                    <button style="margin-top:15px;" class="btn btn-info" type="button" >Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</div>
