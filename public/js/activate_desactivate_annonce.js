$(document).ready(function()
{
    $("button[data-current-status='desactivate']").addClass("btn-success").find("span").text(" Activer l'annonce");
    $("button[data-current-status='activate']").addClass("btn-danger").find("span").text(" Désactiver l'annonce");


    desactivate_annonce();
    activate_annonce();

    
    function desactivate_annonce()
    {
        $(".modal button[data-current-status='activate']").unbind();
        $(".modal button[data-current-status='activate']").click(function(){
            var btn_clicked = $(this);
            var id_annonce_selected = btn_clicked.attr("data-id");
            var button_base_modal = $("button[data-id='"+id_annonce_selected+"'][data-toggle='modal']");

            $.ajax({
                type : 'POST',
                url  : 'ajax/controller/fct_annonce_ajax.php',
                dataType : "HTML",
                data : {"app_fct" : "desactivate_annonce", "id_annonce" : id_annonce_selected},
                success : function(data_return)
                {
                    button_base_modal.removeClass("btn-danger").addClass("btn-success").find("span").text(" Activer l'annonce").attr("data-current-status", "desactivate");
                    
                    btn_clicked.attr("data-current-status", "desactivate");

                    $('#set_active_'+id_annonce_selected).modal('toggle');
                    $("h4[data-fct='return_fct_annonce']").html(data_return).show(500).delay(3000).hide(500);

                    var button_base_modal_span = button_base_modal.parent().parent().find("span.statut_active small b");
                    button_base_modal_span.html("Non").css("color", "red");

                    activate_annonce();
                }
            });
        });
    }


    function activate_annonce()
    {
        $(".modal button[data-current-status='desactivate']").unbind();
        $(".modal button[data-current-status='desactivate']").click(function(){
            var btn_clicked = $(this);
            var id_annonce_selected = btn_clicked.attr("data-id");
            var button_base_modal = $("button[data-id='"+id_annonce_selected+"'][data-toggle='modal']");

            $.ajax({
                type : 'POST',
                url  : 'ajax/controller/fct_annonce_ajax.php',
                dataType : "HTML",
                data : {"app_fct" : "activate_annonce", "id_annonce" : id_annonce_selected},
                success : function(data_return)
                {
                    button_base_modal.removeClass("btn-success").addClass("btn-danger").find("span").text(" Désactiver l'annonce").attr("data-current-status", "activate");
                    
                    btn_clicked.attr("data-current-status", "activate");

                    $('#set_active_'+id_annonce_selected).modal('toggle');
                    $("h4[data-fct='return_fct_annonce']").html(data_return).show(500).delay(3000).hide(500);

                    var button_base_modal_span = button_base_modal.parent().parent().find("span.statut_active small b");
                    button_base_modal_span.html("Oui").css("color", "green");

                    desactivate_annonce();
                }
            });
        });  
    }
});