$(document).ready(function()
{
    $(".modal btn[data-action='validate_annonce']").click(function(){
        $("div.loading_ajax").addClass('loaded');

        var btn_clicked = $(this);
        var id_annonce = btn_clicked.attr("data-id");
        var id_user = btn_clicked.attr("data-id-user");

        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/validate_annonce.php',
            dataType : "HTML",
            data : {"action" : "validate_annonce", "id_annonce" : id_annonce, "id_user" : id_user},
            success : function(data_return)
            {
                console.log(data_return);
                $('#validate_'+id_annonce).modal('hide');
                
                $("h4[data-fct='return_fct_annonce']").html("Vous avez bien validé votre annonce, Merci").show(500).delay(3000).hide(500);
                setTimeout(reload_page, 2000);
            },
            complete : function(){
                $("div.loading_ajax").removeClass('loaded');
            }
        });
    });


    function reload_page()
    {
        document.location.reload(true);
    }
});
