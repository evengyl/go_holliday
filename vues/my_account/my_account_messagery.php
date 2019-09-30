<h4 class="title">Listes de mes Messages</h4><hr>

<ul class="list-unstyled list_annonces_max"><?
    if(!empty($messages))
    {
        foreach($messages as $id_group => $row_messages)
        {
            $row_last_message = $row_messages[0];
            $split_user = explode(",", $row_last_message->id_user_sender);?>
            
                <li class="message" style="padding-top:15px;">
                    <div class="row" style="padding-left:15px; padding-right:15px; "><?
                        if($row_last_message->vu == 0){
                            if($split_user[0] == $_app->user->id_utilisateurs)
                                $tmp = '#5cb85c30';
                            else
                                $tmp = '#f0ad4e30';
                        }
                        else
                            $tmp = '#5cb85c30';?>

                        <div class='col-xs-12' style="background-color: <?= $tmp?>; padding:10px;">

                            <div class="col-xs-9 text-left">
                                <div class="col-xs-12">
                                    <span class="text-muted">
                                        <small><b>Pour l'Annonce : <a href="<?= $row_last_message->url_annonce ?>"><?= $row_last_message->name_announce ?></a></b></small>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <span class="text-muted"><small>Date d'envoi : <?= $row_last_message->send_date ?></small></span><br>
                            </div>
                            <?/*
                            if($_app->user->user_type == 1)
                            {?>
                                <div class="col-xs-1 col-xs-offset-1">
                                    <button class="btn btn-danger" style="padding:5px 10px 5px 10px;" data-action="delete_convers" data-id-grp="<?= $row_last_message->id_group; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div><?
                            }*/?>
                            <div class='col-xs-12' style="text-align:left; background:white; padding:10px; margin-top:10px;">
                                <span class="text-muted"><small><b>Dernier Message : </b></small></span><?
                                if($row_last_message->answer == 0){
                                    if($split_user[0] == $_app->user->id_utilisateurs)
                                        $tmp = 'Répondu';
                                    else
                                        $tmp = 'Non répondu';
                                }
                                else
                                    $tmp = 'Répondu';
                                ?>
                                <span class="text-muted"><small><b><?= $tmp; ?></b></small></span><br>
                                <hr style="margin:10px 10px;">
                                <blockquote style="margin:15px 0 15px; font-size:12px;">
                                    <p><?= $row_last_message->message ?></p>
                                    <footer><b><?
                                        if($row_last_message->answer == 0){
                                            if($split_user[0] == $_app->user->id_utilisateurs)
                                                $tmp = 'De : Moi';
                                            else
                                                $tmp = 'De : '.$row_last_message->name_sender;
                                        }
                                        else
                                        $tmp = 'De : '.$row_last_message->name_sender;
                                    
                                        echo $tmp; ?>
                                    </b></footer>
                                </blockquote>
                                <button data-toggle="modal" data-id_message="<?= $row_last_message->id; ?>" data-target="#<?= $id_group; ?>" class="btn btn-warning btn-sm" style="padding: 5px 20px;">
                                    Ouvrir
                                </button>
                                <script>
                                $(document).ready(function()
                                {
                                    $("button[data-target='#<?= $id_group; ?>']").click(function(e)
                                    {
                                        var id_message = $(this).data("id_message");

                                        $.ajax({
                                            type : 'POST',
                                            url  : '/ajax/controller/set_view_message.php',
                                            dataType : "HTML",
                                            data : {"action" : "set_view_message", "id_message" : id_message},
                                        });
                                    });
                                });
                                </script>
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