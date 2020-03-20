
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 

	<?php 
			if($questions){
			
				foreach($questions as $question){
				
			$id=$question->question_id;

			foreach ($counts[$id] as $val) {

				$dataPoints[$id][] = array('label' => $val['reponse_answer'], 'y' => $val['total']);		
			}

		}
	}
?>	

	<script>
	window.onload = function () {

		<?php if($questions){
			
			foreach($questions as $question){

				$id=$question->question_id;
				?>
		
		var chart<?php echo $id ?> = new CanvasJS.Chart("<?php echo $question->question_name ?>", {
			animationEnabled: true,
			exportEnabled: true,
			title:{
				text: "<?php echo $question->question_name ?>"
			},
			subtitles: [{
				text: " "
			}],
			data: [{
				type: "pie",
				showInLegend: "true",
				legendText: "{label}",
				indexLabelFontSize: 16,
				indexLabel: "{label} - #percent%",
				yValueFormatString: "#,##0",
				dataPoints: <?php echo json_encode($dataPoints[$id], JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart<?php echo $id ?>.render();
		
			<?php 
			}
		}?>
	}
	</script>  

	<h3>Results</h3>

	<table class="table table-bordered table-responsive">
		<tbody>
		<?php 
			if($questions){
			$i=0;
				foreach($questions as $question){
		if ($i==0) {echo '<tr>';} ?>
				
		<td>
			<div id="<?php echo $question->question_name ?>" style="height: 370px; width: 100%;"></div>
		</td>
			
		<?php
			$i++;
			if ($i==2) {echo '</tr>'; $i=0;}
				}
			}
		?>
		</tbody>
	</table>
