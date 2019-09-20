<div class="modal fade" id="send_message_to_annoncer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Conversation avec <?= $annonce->user_name." ".$annonce->user_last_name; ?></h4>
            </div>
            <div class="modal-body">
                    <textarea rows="3" name="message" class="form-control" placeholder="Bonjour, votre annonce m'intéresse. Je prends contact avec vous pour de plus amples informations."></textarea>
                    <button 
                        data-id-annonce="<?= $annonce->id; ?>"
                        data-id-sender="<?= $_app->user->id_utilisateurs; ?>" 
                        data-action="send_message_to_annoncer"
                        style="margin-top:15px;" class="btn btn-info" type="button" role="button">
                        Envoyer
                    </button>
            </div>
            <div class="modal-footer">
            	<p class="thin text-muted text-left"><small>
            		Le respect et la politesse sont de mise également sur ce site, toute demandes frauduleuses ou en non-accord avec le respect de l'autre seront supprimées et non prise en compte.<br>
            		Il advient de vous, d'être correct et poli, cela jouera surement dans la décision du propriétaire de vous louer son bien.</small>
            	</p>
            	<p class="text-center thin text-muted">Histoire d'être sur que vous soyer correct, nous vous remettons les images de cette annonce.</p><?
            	$height = "250px";
            	$width = "width:850px;";
				require($_app->base_dir."/vues/annonces/slide_images.php");?>
            </div>
        </div>
    </div>
</div>



<script>
    function reload_page()
    {
       // document.location.reload(true);
    }

    $(document).ready(function()
	{
	    $(".modal button[data-action='send_message_to_annoncer']").click(function(e)
	    {
	        e.stopPropagation()
	        var id_annonce = $(this).data("id-annonce");
	        var id_sender = $(this).data("id-sender");
	        var message = $(this).parent().find("textarea").val();

	        $.ajax({
	            type : 'POST',
	            url  : '/ajax/controller/send_message.php',
	            dataType : "HTML",
	            data : {"action" : "send_message", "id_annonce" : id_annonce, "id_user_sender" : id_sender, "message" : message},
	            success : function(data_return)
	            {

	            },
	            complete : function()
	            {
	                window.setTimeout(function()
	                {

	                    $('#send_message_to_annoncer').modal('toggle');
	                    setTimeout(reload_page,0);

	                    window.setTimeout(function()
	                    {
	                        $(".modal button[data-action='send_message_to_annoncer']").parent().find("textarea").val("");
	                    }, 200);


	                }, 400);
	            }
	        });
	    });

		
		$("button[data-action='place_to_fav']").click(function(){
			var button_clicked = $(this);
			$.ajax({
	            type : 'POST',
	            url  : '/ajax/controller/add_del_announce_favorite.php',
	            dataType : "HTML",
	            data : {"app_fct" : "add_to_favorite", "id" : button_clicked.attr("data-id")},
	            success : function(data_return)
	            {
	            	button_clicked.attr("disabled", true);
	            },
	        });
		});
		
	});
</script>