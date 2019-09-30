<?
$row_messages = array_reverse($row_messages);

$id_grp = $row_messages[0]->id_group;
$list_user = explode(",", $row_messages[0]->id_user_sender);

$list_user = array_flip($list_user);
unset($list_user[$_app->user->id_utilisateurs]);
$list_user = array_flip($list_user);
$list_user = array_values($list_user);
$id_user_receiver = $list_user[0];
?>                    

<div class="modal fade" id="<?= $id_group; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xlg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Conversation avec <?= $row_messages[0]->name_sender; ?></h4>
            </div>
            <div class="modal-body">
                <div class="zone_message" style="height:350px; overflow: scroll; padding-left:50px; padding-right:50px;"><?
                    foreach($row_messages as $row_message)
                    {
                        $split_user = explode(",", $row_message->id_user_sender);
                        if($split_user[0] == $_app->user->id_utilisateurs)
                        {?>
                            
                            <div class="col-xs-8 col-xs-offset-4" style="padding:10px; background-color:#5cb85c30; margin-bottom:15px;">
                                <p class='col-xs-10'>
                                    <?= $row_message->message; ?>
                                    <small class="thin text-muted">Le <?= $row_message->send_date; ?> à <?= $row_message->time; ?></small>
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
                                    <small class="thin text-muted">Le <?= $row_message->send_date; ?> à <?= $row_message->time; ?></small>
                                </p>
                            </div><?
                        }
                    }?>
                </div>
                <div class="modal-footer">
                    <form>
                        <textarea data-id-grp="<?= $id_grp; ?>" rows="3" name="message" maxlength="250" class="form-control"></textarea>

                        <small><span class="thin text-muted max_char">250</span>&nbsp;caractères restants</small>

                        <button 
                            data-id-grp="<?= $id_grp; ?>"
                            data-id-annonce="<?= $row_message->id_annonce; ?>"
                            data-id-sender="<?= $_app->user->id_utilisateurs; ?>" 
                            data-id-receiver="<?= $id_user_receiver; ?>" 
                            data-action="send_message_<?= $id_group; ?>"
                            style="margin-top:15px;" class="btn-sm btn btn-info" type="button">
                            Envoyer
                        </button>
                    </form>
                    <hr style="margin:10px 10px;">
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#addFiles">
                        Envoyer un fichier
                    </button>
                    <hr style="margin:10px 10px;">
                    <div class="collapse" id="addFiles">
                        <div class="well col-xs-12" id="list_file">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
$(document).ready(function()
{

    $("button[data-target='#addFiles'").click(function(e){
        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/send_files.php',
            dataType : "Json",
            data : {"action" : "get_list", "id_utilisateurs" : <?= $_app->user->id_utilisateurs ?>},
            success : function(data_return)
            {   
               $.each(data_return, function(idx, obj){ 
                    
                    $("#list_file").append('<div class="col-xs-3 mini_doc"><div class="thumbnail">'+
                                              '<img src="'+obj.extension_icon+'">'+
                                              '<div class="caption">'+
                                                '<a target="_blank" href="'+obj.link+'">'+obj.name+'</a>'+
                                                '<p>'+
                                                    '<button href="'+obj.link+'" class="btn btn-primary btn-sm button_send" data-id="'+idx+'" role="button">Envoyer</button>'+
                                                '</p>'+
                                              '</div></div></div>');

                    $(".button_send[data-id='"+idx+"'").click(function(e)
                    {
                        e.stopPropagation();
                        $(this).parent().parent().parent().parent().parent().parent().parent().parent().find("textarea").val('Fichier pour <?= $row_messages[0]->name_sender; ?> : <a target="_blank" href="'+obj.link+'">'+obj.name+'</a>');
                         $(".modal button[data-action='send_message_<?= $id_group; ?>']").trigger("click");
                    });
                });

            },
        });
    });


    $(".modal textarea[data-id-grp='<?= $id_group; ?>']").keyup(function()
    {
        var length = $(this).val().length;
        var max_char = 250;
        length = max_char - length;
        console.log($(this).parent().parent().find("span.max_char"));
        $(this).parent().parent().find("span.max_char").html(length);
    });


    $(".modal button[data-action='send_message_<?= $id_group; ?>']").click(function(e)
    {
        e.stopPropagation();

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
                $('#<?= $id_group; ?>').modal('toggle');
            },
            complete : function()
            {
                reload_page();
                $(".modal button[data-action='send_message_<?= $id_group; ?>']").parent().find("textarea").val("");
            }
        });
    });


    function reload_page()
    {
       document.location.reload(true);
    }
});


</script>