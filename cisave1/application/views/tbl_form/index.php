
	<h3><?php echo $this->session->userdata('username')?>'s Form list</h3>

	<?php
		if($this->session->flashdata('success_msg')){
	?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('success_msg'); ?>
		</div>
	<?php		
		}
	?>


	<?php
		if($this->session->flashdata('error_msg')){
	?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error_msg'); ?>
		</div>
	<?php		
		}
	?>

	<a href="<?php echo base_url('tbl_form/add'); ?>" class="btn btn-primary">Add New Form</a>
	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<td>ID</td>
				<th>Title</th>
				<th>Password</th>
				<th>Description</th>
				<th>Accessibility</th>
				<th>Action</th>
				<th>Last time answered</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			if($forms){
				foreach($forms as $form){
		?>
			<tr>
				<td><?php echo $form->form_id; ?></td>
				<td><?php echo $form->form_name; ?></td>
				<td><?php echo $form->form_password; ?></td>
				<td><?php echo $form->form_desc; ?></td>
				<td><?php 
				if (($form->form_accessible)==0){
					echo "Not accessible";
				} else {
					echo "Accessible";
				}
				?></td>
				<td>
					<a href="<?php echo base_url('tbl_form/edit/'.$form->form_id); ?>" class="btn btn-info">Edit & Results</a>
					<a href="<?php echo base_url('tbl_form/delete/'.$form->form_id); ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this form?');">Delete</a>
				</td>
				<td><?php 
				if (($form->last_time_user_answer)==NULL){
					echo "Never answered";
				} else {
					echo $form->last_time_user_answer;
				}
				?></td>
			</tr>
		<?php
				}
			}
		?>
		</tbody>
	</table>
