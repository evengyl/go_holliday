<h3 class="title">&nbsp; Liste des Réservations actuelles</h3>	
<h4 class="title">&nbsp; Attention cette liste est succeptible de changer si vous ne recharger pas la page.</h4>	


<div class='col-lg-12' id='date_picker'>

</div>
<div class="col-lg-12" >
	<div class=" col-xs-12" style="padding-bottom:10px;">
		<div class="col-xs-12 pull-right" id="reservation_list">
			
		</div>
	</div>
</div>

<script>
	//mise en route du calendrier
	

	


	$(document).ready(function()
	{
		$.ajax({
			url: "/ajax/controller_ajax/reservation_list.php",
			type: "POST",
			data:{'view_calendar' : 1},
			success: function(data_return)
			{
				$( "#date_picker" ).datepicker();
				$( "#date_picker" ).datepicker( "option", "yearRange", "2000:2050" );
				$( "#date_picker" ).datepicker( "option", "weekHeader", "N° Semaine" );
				$( "#date_picker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	        	$("#todo_list").html( data_return );
/*
	        	var admin_todo_list_file = "/ajax/controller_ajax/admin_todo_list.php";
				//attribution des pastile de couleur pour chaque date sur le calendirer
				   <?php
				        $list = '"'.implode('","',$list_date).'"';
				    ?>
				    var list_date = new Array(<?php echo $list ?>);
		    	//en pause car pas d'idée pour mettre la petit puce sur les jours 


				//dès que l'on change de date on envoi la date par ajax pour recuperer la liste des todo du jour selctionner
				$("#date_picker").on('change', function(){
					console.log($('#date_picker')[0].value);
					$.post(admin_todo_list_file, {"action":"list_with_date", "current_select_date":$('#date_picker')[0].value}, function( data_return )
					{
			        	$("#todo_list").html( data_return );
			    	});	
				});

				$("#todo_list").on('change', "input[data-action='active_all_todo']", function(){
					$.ajax({
						url: admin_todo_list_file,
						type: "POST",
						data:'action=active_all_todo',
						success: function(data_return){
				        	$("#todo_list").html( data_return );
						}
			   		});
				});
			

				$('#todo_list').on('click', "button[data-action='view_all_todo_list']", function(){
					$.ajax({
						url: admin_todo_list_file,
						type: "POST",
						data:'action=view_all_todo_list',
						success: function(data_return){
				        	$("#todo_list").html( data_return );
						}
			   		});
				});

				$("#todo_list").on('blur', "td[data-action='edit']",function()
				{

					$(this).addClass("loading");

					$.ajax({
						url: admin_todo_list_file,
						type: "POST",
						data:'column='+$(this).attr("data-column")+'&editval='+this.innerHTML+'&id='+$(this).attr("data-id")+'&current_date='+$('#date_picker')[0].value+'&action=edit',
						success: function(data){
							$(this).removeClass("loading").removeClass("danger");

							$(this).addClass("validate").delay(1000).queue(function(next){
								$(this).removeClass("validate");
								next();
								$.post(admin_todo_list_file, {"action":"list_with_date", "current_select_date":$('#date_picker')[0].value}, function( data_return )
								{
						        	$("#todo_list").html( data_return );
						    	});
							});
						}        
				   });
				});


				$("#todo_list").on('click', "button[data-action='suppression']", function()
				{
					if(confirm("Avez bien fait cette tâche ?"))
					{
						var current_select = $(this);
						$.ajax({
							url: admin_todo_list_file,
							type: "POST",
							data:'id='+current_select.attr("data-id")+'&action=delete',
							success: function(data_return){
								$.post(admin_todo_list_file, {"action":"list_with_date", "current_select_date":$('#date_picker')[0].value}, function( data_return )
								{
						        	$("#todo_list").html( data_return );
						    	});;
							}
				   		});
					}
				});

				$("#todo_list").on('click', "button[data-action='ajout']", function()
				{
					var current_select = $(this);
					console.log($('#date_picker')[0].value);
					$.post(admin_todo_list_file, {"action":"get_last_id"}, function( data_return )
					{
			        	$("#table_list_todo").append('<tr>'+
														'<td >'+data_return+'</td>'+
														'<td contenteditable="true" data-action="edit" data-column="todo_title" data-id="'+data_return+'"></td>'+
														'<td contenteditable="true" data-action="edit" data-column="todo_content" data-id="'+data_return+'"></td>'+
														'<td></td>'+
													'</tr>');

		        	//remettre le new block a jour pour ajouter 
					$('#table_list_todo tr').last().addClass('success');
					$('#table_list_todo tr td').last().html($('#date_picker')[0].value);
								
			    	});
					
				});
*/
			}
   		});


		
	});
</script>
