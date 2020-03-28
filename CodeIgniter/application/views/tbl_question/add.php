
	<h3>Add Question</h3>
	<a href="<?php echo base_url('tbl_form/edit/'.$form->form_id); ?>" class="btn btn-default">Back</a>
	<form action="<?php echo base_url('tbl_form/qsubmit/'.$form->form_id) ?>" method="post" class="form-horizontal">
		<div class="form-group">
			<label name="question_name" class="col-md-2 text-right">Title*</label>
			<div class="col-md-10">
				<input type="text" name="question_name" class="form-control" required autofocus>
			</div>
		</div>
		<div class="form-group">
			<label name="question_type" class="col-md-2 text-right">Type*</label>
			<div class="col-md-10">
				<select type="text" name="question_type" class="form-control" required>
				<option value="champ_texte">champ texte</option>
				<option value="zone_de_texte">zone de texte</option>
				<option value="liste_déroulante">liste déroulante</option>
				<option value="cases_à_cochers">cases à cochers</option>
				<option value="bouton_radio">bouton radio</option>
				<option value="date">date</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label name="question_answers" for="description" class="col-md-2 text-right">Answers*</label>
			<div class="col-md-10">
				<textarea name="question_answer" class="form-control" required placeholder="Separate each answers with a line jump"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label name="question_help" for="description" class="col-md-2 text-right">Description (help)</label>
			<div class="col-md-10">
				<input type="text" name="question_help" class="form-control" placeholder="Enter a description here (not required)">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 text-right"></label>
			<div class="col-md-10">
				<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
			</div>
		</div>
	</form>