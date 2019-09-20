<h4 class="title">Listes de mes Messages</h4><hr>

<ul class="list-unstyled list_annonces_max"><?
    if(!empty($messages))
    {
        foreach($messages as $id_group => $row_messages)
        {
            $id_uniq = uniqid("Message");
            $row_last_message = $row_messages[0];?>
                <li class="message" style="padding-top:15px;">
                    <div class="row" style="padding-left:15px; padding-right:15px; "><?
                        if($row_last_message->answer == 0){
                            if($row_last_message->id_user_sender == $_app->user->id_utilisateurs)
                                $tmp = '#5cb85c30';
                            else
                                $tmp = '#f0ad4e30';
                        }
                        else
                            $tmp = '#5cb85c30';?>

                        <div class='col-xs-12' style="background-color: <?= $tmp?>; padding:15px;">

                            <div class="col-xs-2">
                                <span class="text-muted"><b>De : <?= $row_last_message->name_sender ?></b></span><br>
                            </div>

                            <div class="col-xs-5">
                                <div class="col-xs-12">
                                    <span class="text-muted">
                                        <small><b>Pour l'Annonce : <a href="<?= $row_last_message->url_annonce ?>"><?= $row_last_message->name_announce ?></a></b></small>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <span class="text-muted"><small>Date d'envoi : <?= $row_last_message->send_date ?></small></span><br>
                            </div>
                            <div class="col-xs-1 col-xs-offset-1">
                                <button class="btn btn-danger" style="padding:5px 10px 5px 10px;" data-action="delete_convers" data-id-grp="<?= $row_last_message->id_group; ?>">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                            <hr>
                            <div class='col-xs-12' style="text-align:left; background:white; padding:10px; margin-top:15px;"><?
                                if($row_last_message->vu == 0){
                                    if($row_last_message->id_user_sender == $_app->user->id_utilisateurs)
                                        $tmp = 'Lu';
                                    else
                                        $tmp = 'Non lu';
                                }
                                else
                                    $tmp = 'Lu';
                                ?>
                                <span class="text-muted"><small><b>Dernier Message : <?= $tmp ?></b></small></span><?
                                if($row_last_message->answer == 0){
                                    if($row_last_message->id_user_sender == $_app->user->id_utilisateurs)
                                        $tmp = 'Répondu';
                                    else
                                        $tmp = 'Non répondu';
                                }
                                else
                                    $tmp = 'Répondu';
                                ?>
                                <span class="text-muted"><small><b>, <?= $tmp; ?></b></small></span><br>
                                <hr>
                                <blockquote style="font-size:12px;">
                                    <p><?= $row_last_message->message ?></p>
                                    <footer><b><?
                                        if($row_last_message->answer == 0){
                                            if($row_last_message->id_user_sender == $_app->user->id_utilisateurs)
                                                $tmp = 'De : Moi';
                                            else
                                                $tmp = 'De : '.$row_last_message->name_sender;
                                        }
                                        else
                                        $tmp = 'De : '.$row_last_message->name_sender;
                                    
                                        echo $tmp; ?>
                                    </b></footer>
                                </blockquote>
                                <button data-toggle="modal" data-target="#<?= $id_uniq; ?>" class="btn btn-warning btn-sm" style="padding: 5px 20px;">Ouvrir</button>
                            </div>
                        </div>
                    </div>
                </li><?
            require($_app->base_dir.'/vues/my_account/my_account_modal_message.php');
        }
    }
    else
    {?>
        <div class="col-xs-12">
            <span class="text-muted">
                <small><b>Vous n'avez aucun message dans votre boite.</b></small>
            </span>
        </div><?
    }?>
</ul>






<script>
$(document).ready(function()
{
    $("button[data-action='delete_convers']").click(function(e)
    {
        confirm("Voulez-vous vraiment supprimer cette conversation ?");

        e.stopPropagation()

        var id_group = $(this).data("id-grp");

        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/delete_group_message.php',
            dataType : "HTML",
            data : {"action" : "delete_group", "id_group" : id_group},
            success : function(data_return)
            {
                console.log(data_return);
            },
            complete : function()
            {
                setTimeout(reload_page,400);
            }
        });
    });


    function reload_page()
    {
        document.location.reload(true);
    }
});


</script>