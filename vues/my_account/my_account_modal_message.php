<div class="modal fade" id="<?= $id_group; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Conversation avec <?= $row_last_message->name_sender; ?></h4>
            </div>
            <div class="modal-body">
                <div class="zone_message" style="height:600px; overflow: scroll; padding-left:50px; padding-right:50px;"><?

                    $row_messages = array_reverse($row_messages);
                    $id_grp = $row_messages[0]->id_group;

                    $list_user = explode(",", $row_messages[0]->id_user_sender);
                    
                    $list_user = array_flip($list_user);
                    unset($list_user[$_app->user->id_utilisateurs]);
                    $list_user = array_flip($list_user);
                    $list_user = array_values($list_user);
                    $id_user_receiver = $list_user[0];

                    foreach($row_messages as $row_message)
                    {
                        $split_user = explode(",", $row_message->id_user_sender);
                        if($split_user[0] == $_app->user->id_utilisateurs)
                        {?>
                            
                            <div class="col-xs-8 col-xs-offset-4" style="padding:10px; background-color:#5cb85c30; margin-bottom:15px;">
                                <p class='col-xs-10'>
                                    <?= $row_message->message; ?>
                                    <small class="thin text-muted">à <?= $row_message->time; ?></small>
                                </p>
                                <p class="col-xs-2">
                                    <i style="position:absolute; right:0px; color: #5bc0de;" class="fa-2x far fa-sun"></i>
                                </p>
                            </div><?
                            
                        }
                        else
                        {?>
                            <div class="col-xs-8" style="padding:10px; background-color:#f0ad4e30;  margin-bottom:15px;">
                                <p class="col-xs-2">
                                    <i style="position:absolute; left:0px; color: #5bc0de;" class="fa-2x far fa-grin-stars"></i>
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
                    <button 
                        data-id-grp="<?= $id_grp; ?>"
                        data-id-annonce="<?= $row_message->id_annonce; ?>"
                        data-id-sender="<?= $_app->user->id_utilisateurs; ?>" 
                        data-id-receiver="<?= $id_user_receiver; ?>" 
                        data-action="send_message_<?= $id_group; ?>"
                        style="margin-top:15px;" class="btn btn-info" type="button">
                        Envoyer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function()
{
    $(".modal button[data-action='send_message_<?= $id_group; ?>']").click(function(e)
    {
        e.stopPropagation()

        var id_annonce = $(this).data("id-annonce");
        var id_user_sender = $(this).data("id-sender");
        var id_user_receiver = $(this).data("id-receiver");
        var id_group = $(this).data("id-grp");
        var message = $(this).parent().find("textarea").val();


        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/send_message.php',
            dataType : "HTML",
            data : {"action" : "send_message", "id_annonce" : id_annonce, "id_user_sender" : id_user_sender, "id_user_receiver" : id_user_receiver, "id_group" : id_group, "message" : message},
            success : function(data_return)
            {
                console.log(data_return);
            },
            complete : function()
            {
                window.setTimeout(function()
                {

                    $('#<?= $id_group; ?>').modal('toggle');
                    setTimeout(reload_page,0);

                    window.setTimeout(function()
                    {
                        $(".modal button[data-action='send_message_<?= $id_group; ?>']").parent().find("textarea").val("");
                    }, 200);


                }, 400);
            }
        });
    });


    function reload_page()
    {
        document.location.reload(true);
    }
});


</script>