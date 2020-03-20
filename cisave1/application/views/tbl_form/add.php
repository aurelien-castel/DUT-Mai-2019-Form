
	<h3>Add Form</h3>
	<a href="<?php echo base_url('tbl_form/index'); ?>" class="btn btn-default">Back</a>
	<form action="<?php echo base_url('tbl_form/submit') ?>" method="post" class="form-horizontal">
		<div class="form-group">
			<label name="form_name" class="col-md-2 text-right">Title</label>
			<div class="col-md-10">
				<input type="text" name="form_name" class="form-control" required autofocus>
			</div>
		</div>
		<div class="form-group">
			<label name="form_password" class="col-md-2 text-right">Password</label>
			<div class="col-md-10">
				<input type="text" name="form_password" value="Copy the Password code to share the form once you have a question in 'Edit & Results' section and click on 'Generate a password'" class="form-control" disabled>
			</div>
		</div>
		<div class="form-group">
			<label name="form_desc" class="col-md-2 text-right">Description</label>
			<div class="col-md-10">
				<textarea name="form_desc" class="form-control" required></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 text-right"></label>
			<div class="col-md-10">
				<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
			</div>
		</div>
	</form>