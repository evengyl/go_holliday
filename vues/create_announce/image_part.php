<div class="col-xs-12 panel panel-default" style="margin-top:15px; background:url(/images/autres/3_opa.png) no-repeat center;">
	<div class="panel-heading" role="tab" id="headingOne" style="margin-top:15px;">
		<h4>
			Ajouter dès à présent vos photos / images (10 Max)<br>
		</h4>
		<small class="text-muted thin">(La première sera utilisée comme images principale de votre annonce)</small><br>
		<small class="text-muted thin">(Format supporté : .png  .jpg  .jpeg  .bnp  .gif  .tif)</small><br>
		<small class='text-muted thin'>Glisser / Déposer vos images içi, ou sélectionnez les en cliquant ici</small><br>
		<span  data-id-annonce="<?= $last_announce->id_annonce; ?>"></span>
		
	</div>
	<div class="panel-body">
		<div class="col-xs-12 dropzone" id="dropzone_img_upload">
		</div>
	    <hr>
	</div>

</div>


<script>

	var url_uploads = "/ajax/controller/upload_image_annonces.php";
	var accept_format = ".png,.jpg,.jpeg,.bnp,.gif,.tif";
	Dropzone.autoDiscover = false;

	var id_annonces = $("span[data-id-annonce]").attr("data-id-annonce");

	// Dropzone class:
	var myDropzone = new Dropzone("#dropzone_img_upload",
	{
		url: "/ajax/controller/upload_image_annonces.php?id_annonces="+id_annonces,
		paramName: "file",
	    acceptedFiles: accept_format,
	    maxFiles: 10,
	    clickable: true,
	    success: function(data){
	    	list_preview();
	    }

	});


	$(document).ready(function()
	{
		list_preview();
	});


	function list_preview()
	{
		$.ajax({
			url: url_uploads,
			type: 'GET',
			data: "option=preview_img&id_annonces="+id_annonces,
			dataType: "html",
			success:function(data){
				$('#dropzone_img_upload').html(data);

				$("button[data-option='delete_img']").on('click', function(event){
					delete_img($(this).data("id-img"))
				});
			}
		});
	}

	function delete_img(id)
	{
	 	$.ajax({
			url: url_uploads,
			type: 'GET',
			data: "option=delete_img&id_img="+id+"&id_annonces="+id_annonces,
			dataType: "html",
			success:function(data){
				list_preview();
			}
		});
	}

</script>
