<?php
	if(isset($_POST['name'])) 
	{
		$output= array();
		$name= ($_POST["name"] !='') ? $_POST['name'] : '';
		$goal1=($_POST["goal1"] !='') ? $_POST['goal1'] : '';
		$goal2=($_POST["goal2"] !='') ? $_POST['goal2'] : '';
		$goal3=($_POST["goal3"] !='') ? $_POST['goal3'] : '';
		if ($name !='' && $goal1 !='' && $goal2 !='' && $goal3 !='') {	

			$message=$name.", ".$goal1.", ".$goal2.", ".$goal3;
			$dataFile='data.log';
			file_put_contents($dataFile, "");
			if (file_exists($dataFile)) {
				$fh = fopen($dataFile, 'a');
				fwrite($fh, $message."\n");
			} else {
				$fh = fopen($dataFile, 'w');
				fwrite($fh, $message."\n");
			}
			fclose($fh);
			$output['status']="success";
			$output['message']="Thanks for your answers.";
		}
		else{
			$output['status']="missing_parameter";
			$output['message']="Please fill in all the fields.";
		}
		echo json_encode($output);
		exit;
	}
?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>Survey Form</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
	<div class="full_block">
	<!-- Form div section  -->
	<div class="form_block">
	<form action="" method="post" id="survey_form">
	<p> <label class="field_label name_label">Your name:</label> <input id="user_name" type="text" placeholder="Please leave your name here" name="user_name"></p>
		<h3>What are your 3 major life goals?</h3>
		<div class="goal_div">
		<p> <label class="field_label">Goal #1:</label> <input id="goal1" type="text" placeholder="Put your goal #1 here" name="user_name"></p>
		<p> <label class="field_label">Goal #2:</label> <input id="goal2" type="text" placeholder="Put your goal #2 here" name="user_name"></p>
		<p> <label class="field_label">Goal #3:</label> <input id="goal3" type="text" placeholder="Put your goal #3 here" name="user_name"></p>
		</div>
		<div class="submit_section">
		<input id="submit_survey" name="survey_submit" type="button" value="Submit">		 
		</div>
		</form>		
		</div>
		</div>
		<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
		<span class="close">&times;</span>
			<p>Some text in the Modal..</p>
			</div>

			</div>
			</body>
			</html>