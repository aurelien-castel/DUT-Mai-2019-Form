<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Welcome</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
  <div class="jumbotron">
        <h2>Welcome to the form "<?php echo $form_name; ?>"</h2>
        <p><?php echo $form_desc; ?></p>

  </div>

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
<div class="jumbotron">
<a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default">Back</a>

<form action="<?php echo base_url('tbl_reponse/submit') ?>" method="post" class="form-horizontal">

<script>
  var controls = form.elements;
  for (var i=0, iLen=controls.length; i<iLen; i++) {
    controls[i].disabled = controls[i].value == '';
  }
}</script>

          <?php 
    if($questions){
      $numquestion=1;
      $i=0;
      $lines="";
      foreach($questions as $question){
  ?>
          <div class="jumbotron">
            <p><?php echo $numquestion; ?> .  <?php echo $question->question_name; ?></p>
            
            <?php 
            foreach($answers as $answer){ 
              if($question->question_id===$answer->question_id){
                $lines.=$answer->question_answer."\n";
                 }
                }

                if ($question->question_help) { echo '<h5> Tips: '.$question->question_help.'</h5>'; } ?>

            <?php if($question->question_type==='champ_texte'){
              ?><input name="useranswer[<?php echo $question->question_id; ?>]" type="text" placeholder="<?= $lines ?>" class="form-control" ><?php   
          
            }

            else if($question->question_type  ==='zone_de_texte'){
              ?><textarea name="useranswer[<?php echo $question->question_id; ?>]" type="text" placeholder="<?= $lines ?>" class="form-control" ></textarea><?php
            }

            else if($question->question_type==='liste_déroulante'){
              ?><select name="useranswer[<?php echo $question->question_id; ?>]" type="text" class="form-control" >
              <option disabled selected value> -- select an option -- </option>
              <?php
              
              foreach($answers as $answer){ 
                if($question->question_id===$answer->question_id){
                ?>
                <option value="<?php echo $answer->question_answer; ?>"><?php echo $answer->question_answer; ?></option>
              <?php 
              }
            } 
            ?> </select> <?php

          }

            else if($question->question_type==='cases_à_cochers'){
              
              foreach($answers as $answer){ 
                if($question->question_id===$answer->question_id){
                ?>
                <div class="form-control">
                <input name="useranswer[<?php echo $question->question_id; ?>][]" value="<?php echo $answer->question_answer; ?>" type="checkbox" id="checkbox"><?php echo "\r".$answer->question_answer; ?>
                </div>
              <?php
                }
              }

          }
            else if($question->question_type==='bouton_radio'){ 
              
              foreach($answers as $answer){ 
                if($question->question_id===$answer->question_id){
                ?>
                <div class="form-control">
                <input name="useranswer[<?php echo $question->question_id; ?>]" value="<?php echo $answer->question_answer; ?>" type="radio" id="radio"><?php echo "\r".$answer->question_answer; ?>
                </div>
              <?php
                }
              }

            }
            else if($question->question_type==='date'){
              ?>
              <p><?php echo $lines; ?></p>
              <input name="useranswer[<?php echo $question->question_id; ?>]" type="date" id="date" class="form-control">
            <?php
            
            } ?>

          
          </div>
          <?php
        $lines="";
        $numquestion++;
        $i++;
      }
    }
  ?>

      <div class="col-md-10">
          <input type="submit" name="btnSave" class="btn btn-primary" value="Submit" style="width:100%; height:40px; font-size:20px">
      </div>

</form>

    </div>

  </div>
  </div>

</body>

</html>