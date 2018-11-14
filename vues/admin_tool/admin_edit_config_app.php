<div class="col-xs-6 col-lg-offset-3 col-without-padding col-without-radius content_game">
	<form action="#" method="post"><?
		foreach($list_option as $row_config)
		{?>
			<div class="input-group">
				<span class="input-group-addon">
					<input type="checkbox" name="<?= $row_config->id; ?>" <?=($row_config->value)?"checked":""?> value='1' aria-label="<?= $row_config->name; ?>">
				</span>
				<input type="text" class="form-control" placeholder="<?= $row_config->name_human_see; ?>" disabled>
			</div><?
		}?>
		<input type="hidden" name="form__config" value="1">
		<button type="submit" class="btn btn-default">Submit</button>
	<form>
</div>
