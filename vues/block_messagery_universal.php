<div class="modal fade" id="send_message_<?= $id_specific_modal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Conversation avec <?= $name_receiver; ?></h4>
            </div>
            <div class="modal-body">
				<div class="zone_message" style="height:350px; overflow-y: scroll; padding-left:50px; padding-right:50px;"><?
					if(!empty($messages))
					{
					    foreach($messages[$id_group] as $row_message)
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
					    }
				    }
                    else
                        echo '<div class="col-xs-12 bg-warning" style="padding:10px; margin-bottom:15px;">Cette conversation ne comprend aucun mesages</div>'

                        ?>
				</div>
				<div class="modal-footer">

					 <form>
                        <div class="form-group has-feedback">
    						<textarea data-id-grp="<?= $id_group; ?>" rows="3" name="message" maxlength="250" class="form-control"></textarea>

    						<small><span class="thin text-muted max_char">250</span>&nbsp;caractères restants</small>

    						<button 
                                type="submit"
    						    data-id-grp="<?= $id_group; ?>"
    						    data-id-annonce="<?= $id_annonce; ?>"
    						    data-id-sender="<?= $id_sender; ?>" 
    						    data-id-receiver="<?= $id_receiver; ?>" 
    						    data-action="send_message_<?= $id_group; ?>"
    						    style="margin-top:15px;" class="btn-sm btn btn-info" type="button">
    						    Envoyer
					       	</button>
                        </div>
					</form>

					<hr style="margin:10px 10px;">

					<button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#addFiles_<?= $id_group; ?>">
					    Envoyer un fichier
					</button>
					<hr style="margin:10px 10px;">
					<div class="collapse" id="addFiles_<?= $id_group; ?>">
					    <div class="well col-xs-12" id="list_file">
					        
					    </div>
					</div>
				</div>

            </div><?
            if(isset($slide_img))
            {?>
                <div class="modal-footer">
                	<p class="thin text-muted text-left"><small>
                		Le respect et la politesse sont de mise également sur ce site, toute demandes frauduleuses ou en non-accord avec le respect de l'autre seront supprimées et non prise en compte.<br>
                		Il advient de vous, d'être correct et poli, cela jouera surement dans la décision du propriétaire de vous louer son bien.</small>
                	</p>
                	<p class="text-center thin text-muted">Histoire d'être sur que vous soyer correct, nous vous remettons les images de cette annonce.</p><?
                	$height = "250px";
                	$width = "width:850px;";
    				require($_app->base_dir."/vues/annonces/slide_images.php");?>
                </div><?
            }?>
        </div>
    </div>
</div>



<script>
   
$(document).ready(function()
{ 

	$(".modal button[data-action='send_message_<?= $id_group; ?>']").click(function(e)
    {
        e.stopPropagation();
        e.preventDefault();

        var id_annonce = $(this).data("id-annonce");
        var id_user_sender = $(this).data("id-sender");
        var id_user_receiver = $(this).data("id-receiver");
        var id_group = $(this).data("id-grp");
        var message = $(this).parent().find("textarea").val();


        if(message.length == 0)
        {
            $(".modal button[data-action='send_message_<?= $id_group; ?>']").parent().find("textarea").attr("placeholder", "Veuillez complèter ce champs");
            $(".modal button[data-action='send_message_<?= $id_group; ?>']").parent().addClass("has-error");
            return false;
        }

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




    $(".modal textarea[data-id-grp='<?= $id_group; ?>']").keyup(function()
    {
        var length = $(this).val().length;
        var max_char = 250;
        length = max_char - length;
        $(this).parent().removeClass("has-error").addClass("has-success");
        $(this).parent().parent().find("span.max_char").html(length);
    });




    $("button[data-target='#addFiles_<?= $id_group; ?>'").click(function(e){
        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/send_files.php',
            dataType : "Json",
            data : {"action" : "get_list", "id_utilisateurs" : <?= $_app->user->id_utilisateurs ?>},
            success : function(data_return)
            {   console.log(data_return);
               $.each(data_return, function(idx, obj){ 
                    
                    $("#list_file").html('<div class="col-xs-3 mini_doc"><div class="thumbnail">'+
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
                        $(this).parent().parent().parent().parent().parent().parent().parent().parent().find("textarea").val('<a target="_blank" href="'+obj.link+'">'+obj.name+'</a> (Enregistrer ce document, il pourrait servir)');
                         $(".modal button[data-action='send_message_<?= $id_group; ?>']").trigger("click");
                    });
                });

            },
        });
    });
});

</script>