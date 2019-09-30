<h4 class="title">Listes de mes documents</h4>
<button data-toggle="modal" data-target="#add_document" title="Ajouter un document" style="padding:7px 20px 7px 20px;" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
<hr>

<ul class="list-unstyled list_annonces_max"><?
    if(!empty($documents))
    {
        foreach($documents as $row_document)
        {?>
            <li class="annonce" style="padding:10px;">
                <div class="row" style="padding-left:15px; padding-right:15px;">
                    <div class="col-xs-2">
                        <a title="Voir le fichier" style="margin-top:0px;" href="<?= $row_document['link'];?>" class="opt_annonce btn btn-success">
                            <small><i class="far fa-eye"></i></small>
                        </a>
                        <button title="Supprimer le fichier" class="btn btn-danger" style="padding:5px 10px 5px 10px;" data-action="delete_file" data-link="<?= $row_document['link']; ?>">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                    <div class="col-xs-8">
                        <div class="col-xs-6">
                            <a title="Voir le fichier" style="margin-top:0px;" href="<?= $row_document['link'];?>">
	                            <b><?= $row_document['name'] ?></b>
                        	</a>
                            <br>
                            <span class="text-muted"><small>Date d'ajout : <?= $row_document['time'] ?></small></span>
                        </div>
                        
                </div>
                <div class="col-xs-2">
            		<img class="img-responsive" src="<?= $row_document['extension_icon']; ?>">
                </div>
            </li><?
        }
    }?>
</ul>


<div class="modal fade" id="add_document" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un document</h4>
				<small class="text-muted thin">(Format supporté : .doc, .docx, .pdf)</small><br>
				<small class='text-muted thin'>Glisser / Déposer vos documents içi, ou sélectionnez les en cliquant ici</small><br>
                <span data-id-utilisateur="<?= $_app->user->id_utilisateurs; ?>"></span>
            </div>
            <div class="modal-body" style="min-height:250px;">
				<div id="dropzone_doc_upload" class="dropzone" style="background-image:url('/images/upload_img.jpg');  background-repeat: no-repeat; background-position:center;opacity:.45;">

				</div>
            </div>
        </div>
    </div>
</div>


<script>

Dropzone.autoDiscover = false;
$(document).ready(function()
{
	var url_uploads = "/ajax/controller/upload_doc_annonceur.php";
	var accept_format = ".doc, .docx, .pdf";
	

	var id_utilisateurs = $("span[data-id-utilisateur]").attr("data-id-utilisateur");

	// Dropzone class:
	var docDropzone = new Dropzone("#dropzone_doc_upload",
	{
		url: "/ajax/controller/upload_doc_annonceur.php?id_utilisateurs="+id_utilisateurs,
		paramName: "file",
	    acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
	    maxFilesize: 10,
	    maxFiles: 10,
	    clickable: true,
	    init: function()
	    {
            this.on("success", function(file, response)
            {
                $('.dz-progress').hide();
                $('.dz-size').hide();
                $('.dz-error-mark').hide();
                reload_page();
            });
        }
	});


    $("button[data-action='delete_file']").click(function(e)
    {
        confirm("Voulez-vous vraiment supprimer ce fichier ?");

        e.stopPropagation()

        var link = $(this).data("link");

        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/delete_file.php',
            dataType : "HTML",
            data : {"action" : "delete_file", "link" : link},
            success : function(data_return)
            {
                reload_page();
            },
        });
    });


    function reload_page()
    {
        document.location.reload(true);
    }
});
</script>
