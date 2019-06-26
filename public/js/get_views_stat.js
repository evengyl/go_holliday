$(document).ready(function()
{
    var config = {};
    fill_graph_views(config);
    
    function fill_graph_views()
    {
        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/fill_graph_views_stats.php',
            dataType : "HTML",
            success : function(data_return)
            {
                data_return = JSON.parse(data_return);

                array_used_month = data_return[0];
                array_views = data_return[1];
                array_color = data_return[2];


                var month_used = [];
                $.each( array_used_month, function( i, value ) {

                  month_used.push(value);

                });


                var id_color = 0;
                var array_datasets = {};
                $.each( array_views, function(i, value )
                {
                    
                    array_datasets[i] = {
                        config : {
                            type: 'line',
                            data: {
                                labels: month_used,
                                datasets: [{
                                    label : i,
                                    data : value,
                                    fill : false,
                                    backgroundColor : array_color[id_color],
                                    borderColor : array_color[id_color],
                                    borderWidth: 1
                                }],

                            }
                        }
                    }

                    id_color ++;
                });


                $.each(array_datasets, function(i , value)
                {
                    $('#graphViewsStats').append("<div class='col-xs-3'><canvas class='' id='"+i+"'></canvas></div>")
                    var ctx = $('#'+i);
                    new Chart(ctx, value.config);   
                });

            }
        });
    }
});
