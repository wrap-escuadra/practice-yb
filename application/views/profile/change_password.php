<div class="col-md-offset-4 col-md-4">
	

<form action="" method="post">
	<div class="form-group">
		<label for="username">Username</label>
		<input class="form-control" name="username" maxlength="30" value="<?=$user['username'];?>" />
	</div>
	<div class="form-group">
		<label for="old_password">Current password</label>
		<input class="form-control" type="password" name="current_password" maxlength="30" <?=set_value('current_password');?>  />
	</div>
	<div class="form-group">
		<label for="password">New password</label>
		<input class="form-control" type="password" name="password" maxlength="30" <?=set_value('password');?> />
	</div>
	<input class="form-control" type="hidden" name="old_username" maxlength="30" value="<?=$user['username']?>" />
	<div class="form-group">
		<label for="password_confirmation">Confirm new password</label>
		<input class="form-control" type="password" name="password_confirmation" <?=set_value('password_confirmation');?> >
	</div>
	<div class="form-group text-right">
		<button type="submit" class="btn-primary btn">Save</button>
	</div>
</form>

</div>