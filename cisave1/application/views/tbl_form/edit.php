
	<h3>Edit Form</h3>
	<a href="<?php echo base_url('tbl_form/index'); ?>" class="btn btn-default">Back</a>
	<form action="<?php echo base_url('tbl_form/update') ?>" method="post" class="form-horizontal">
		<input type="hidden" name="txt_hidden" value="<?php echo $form->form_id; ?>">
		<div class="form-group">
			<label for="title" class="col-md-2 text-right">Title</label>
			<div class="col-md-10">
				<input name="form_name" type="text" value="<?php echo $form->form_name; ?>" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="title" class="col-md-2 text-right">Password</label>
			<div class="col-md-10">
				<p for="description">Copy the Password code to share the form once you have a question in 'Edit & Results' section and 'Generate a password'</p>
				<div name="form_password" type="text" class="form-control"><p><?php echo $form->form_password; ?></p></div>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-2 text-right">Description</label>
			<div class="col-md-10">
				<textarea name="form_desc" class="form-control" required><?php echo $form->form_desc; ?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="col-md-2 text-right">Action</label>
			<div class="col-md-10">
				<?php if($form->form_password=="")  { //si il y a pas de mdp alors on peut activer
					$act="activate";
					$class="btn btn-info";
					$p="Generate password";
				} else { //sinon on desactive
						$act="desactivate";
						$class="btn btn-danger";
						$p="Delete password";
				} ?>	
				<a id="<?=$act?>" href="<?php echo base_url('tbl_form/'.$act.'/'.$form->form_id); ?>" class="<?=$class?>"><?=$p?></a> 

				<?php if($form->form_accessible=="0")  { //si non accessible
					$act="activate_accessible";
					$class="btn btn-info";
					$p="Set the Access";
				} else { //sinon on desactive
						$act="desactivate_accessible";
						$class="btn btn-danger";
						$p="Disable the Access";
				} ?>	
				<a id="<?=$act?>" href="<?php echo base_url('tbl_form/'.$act.'/'.$form->form_id); ?>" class="<?=$class?>"><?=$p?></a> 
			</div>
			
		</div>

		<div class="form-group">
			<label for="description" class="col-md-2 text-right">Status</label>
			<div class="col-md-10">
			<p for="description">
			
			<?php 
			if(($form->form_password=="")&&($form->form_accessible=="0"))  {
				echo "You have no password to share click on 'Generate password'.";
			}
			else if($form->form_password=="")  {
				echo "You have no password to share click on 'Generate password'.";
			}
			else if($form->form_accessible=="0") {
				echo "Click on 'Set the Access' when you want to enable the access for users.";
			}
			else {
				echo "You can share it :^) Share your Password to users.";
			}
				?>
				</p>
			</div>
		</div>

		<div class="form-group">
			
			<div class="col-md-10">
				<input type="submit" name="btnUpdate" class="btn btn-primary" value="Update form informations">
			</div>	
		</div>
		
	</form>
	