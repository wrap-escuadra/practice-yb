<form  id="form-img" method="post" enctype="multipart/form-data" class="" style="padding: 20px" >
	<div class="form-group">
		<input type="hidden" name="profile_id" value="" id="student_id" required="" />
		<input type="hidden" name="img_id" value="" id="img_id"  />
		<p class="form-msg"></p>
		<label for="userfile">Image update</label>
		<input type="file" name="userfile" class="form-control" accept="image/jpg,image/jpeg" required />
	</div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-primary">Upload</button>	
	</div>
</form>