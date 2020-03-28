
	<h3>Question list</h3>

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

	<a href="<?php echo base_url('tbl_form/qadd/'.$form->form_id); ?>" class="btn btn-primary">Add New question</a>
	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<td>ID</td>
				<th>Question</th>
				<th>Type</th>
				<th>Answers</th>
				<th>Description (help)</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			if($questions){
				foreach($questions as $question){
		?>
			<tr>
				<td><?php echo $question->question_id; ?></td>
				<td><?php echo $question->question_name; ?></td>
				<td><?php echo $question->question_type; ?></td>
				<td><?php 
				foreach($answers as $answer){ 
					if($question->question_id===$answer->question_id){
					echo $answer->question_answer;
					echo "\n"; }
					} ?></td>
				<td><?php echo $question->question_help; ?></td>
				<td>
					<a href="<?php echo base_url('tbl_form/qedit/'.$form->form_id.'/'.$question->question_id); ?>" class="btn btn-info">Edit</a>
					<a href="<?php echo base_url('tbl_form/qdelete/'.$form->form_id.'/'.$question->question_id); ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this question?');">Delete</a>
				</td>
			</tr>
		<?php
				}
			}
		?>
		</tbody>
	</table>
