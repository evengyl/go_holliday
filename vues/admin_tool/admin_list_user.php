<?
if(isset($var_txt))
	echo $var_txt;?>


<div class="col-xs-8 col-lg-offset-2 col-without-padding col-without-radius content_game">
	<table class="table table-bordered table-hover" style='background:white;'>
		<tr><?
			foreach($list_user[0] as $key_table => $row_user)
			{?>
				<th>
					<?= $key_table ?>
				</th><?
			}?>
			<th>Option</th>
		</tr><?
		foreach($list_user as $key_config)
		{?>
			<tr><?
				foreach($key_config as $row_user)
				{?>
					<td>
						<?= $row_user ?>
					</td><?
				}?>
				<td><a class='btn btn-primary' style='padding-left:5px; padding-right:5px;' href='?page=admin&action=edit_user&id=<?= $key_config->id; ?>'>Edit</td>
		    </tr><?
		}?>
	</table>
</div>