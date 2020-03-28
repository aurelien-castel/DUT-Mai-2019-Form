
	<h3>Edit Question</h3>
	<a href="<?php echo base_url('tbl_form/edit/'.$form->form_id); ?>" class="btn btn-default">Back</a>
	<form action="<?php echo base_url('tbl_form/qupdate/'.$form->form_id.'/'.$question->question_id) ?>" method="post" class="form-horizontal">
		<input type="hidden" name="txt_hidden" value="<?php echo $question->question_id; ?>">
		<div class="form-group">
			<label name="question_name" class="col-md-2 text-right">Title*</label>
			<div class="col-md-10">
				<input type="text" name="question_name" value="<?php echo $question->question_name; ?>" class="form-control" required autofocus>
			</div>
		</div>
		<div class="form-group">
			<label name="question_type" class="col-md-2 text-right">Type*</label>
			<div class="col-md-10">
				<select type="text" name="question_type" value="<?php echo $question->question_type; ?>" class="form-control" required>
				<option value="champ_texte" 
				<?php if ($question->question_type==='champ_texte') { echo "selected"; } ?>>champ texte</option>

				<option value="zone_de_texte" 
				<?php if ($question->question_type==='zone_de_texte') { echo "selected"; } ?>>zone de texte</option>
				
				<option value="liste_déroulante" 
				<?php if ($question->question_type==='liste_déroulante') { echo "selected"; } ?>>liste déroulante</option>
				
				<option value="cases_à_cochers" 
				<?php if ($question->question_type==='cases_à_cochers') { echo "selected"; } ?>>cases à cochers</option>
				
				<option value="bouton_radio" 
				<?php if ($question->question_type==='bouton_radio') { echo "selected"; } ?>>bouton radio</option>
				
				<option value="date" 
				<?php if ($question->question_type==='date') { echo "selected"; } ?>>date</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label name="question_answers" for="description" class="col-md-2 text-right">Answers*</label>
			<div class="col-md-10">
				<textarea name="question_answer" class="form-control" required placeholder="Separate each answers with a line jump"><?php 
				foreach($answers as $answer){ 
					if($question->question_id===$answer->question_id){
						echo $answer->question_answer;
						echo "\n"; }
				}
					 ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label name="question_help" for="description" class="col-md-2 text-right">Description (help)</label>
			<div class="col-md-10">
				<input type="text" name="question_help" value="<?php echo $question->question_help; ?>" class="form-control" placeholder="Enter a description here (not required)">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 text-right"></label>
			<div class="col-md-10">
				<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
			</div>
		</div>
	</form>