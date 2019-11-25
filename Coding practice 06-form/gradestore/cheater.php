<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>
444444444444444
	<body>

		<?php
			$getname = isset($_POST["Name"])? $_POST["Name"] : ' ';
			$getid = isset($_POST["ID"])? $_POST["ID"] : ' ';
			$getcourse = isset($_POST["Course"])? $_POST["Course"] : ' ';
			$getgrade = isset($_POST["Grade"])? $_POST["Grade"] : ' ';
			$getccnum = isset($_POST["CCnum"])? $_POST["CCnum"] : ' ';
			$getcc = isset($_POST["CC"])? $_POST["CC"] : ' ';


			function processCheckbox($names){
				$getcourse = isset($_POST["Course"])? $_POST["Course"] : ' ';
					if(count($getcourse)==1){
							print $getcourse[0];
							$course = $getcourse[0];
						}
						elseif (count($getcourse)==2) {
						 	$course = $getcourse[0].", ".$getcourse[1];
						}
						elseif (count($getcourse)==3) {
							$course = $getcourse[0].", ".$getcourse[1].", ".$getcourse[2];
						}
						elseif (count($getcourse)==4) {
							$course = $getcourse[0].", ".$getcourse[1].", ".$getcourse[2].", ".$getcourse[3];
						}
					$course = implode(", ", $names);
					return $course;
			}


			if (!isset($_POST["Name"])||!isset($_POST["ID"])||!isset($_POST["Course"])
					||!isset($_POST["Grade"])||!isset($_POST["CCnum"])||!isset($_POST["CC"])
					||empty($_POST["Name"])||empty($_POST["ID"])||empty($_POST["Course"])
					||empty($_POST["Grade"])||empty($_POST["CCnum"])||empty($_POST["CC"])){?>


		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
			}elseif(!preg_match('/^[a-zA-Z]+(-[a-zA-Z]+)*([\s]?[a-zA-Z]+(-[a-zA-Z]+)*)?$/', $_POST["Name"])){
			?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>
			<?php
			}elseif((!preg_match('/^[4][0-9]{15}/', $getccnum)&& $getcc=="visa")||(!preg_match('/^[5][0-9]{15}/', $getccnum) && $getcc=="mastercard")){
			?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

			<?php
			}else { ?>
			<h1>Thanks, looser!</h1>
			<p>Your information has been recorded.</p>


			<?php
			$cou = processCheckbox($getcourse);
			 ?>
			<ul>
				<li>Name: <?php echo $_POST['Name']?></li>
				<li>ID: <?php echo $_POST['ID']?></li>
				<li>Course: <?=$cou?> </li>
				<li>Grade: <?php echo $_POST['Grade']?></li>
				<li>Credit <?php echo $_POST['CCnum'].' ('.$_POST['CC'].')'?></li>
			</ul>
				<p>Here are all the loosers who have submitted here:</p>
			<?php
				$information = $getname.";".$getid.";".$getccnum.";".$getcc."\n";
				$filename = "loosers.txt";
				file_put_contents($filename, $information, FILE_APPEND);
				echo nl2br(file_get_contents($filename));
			}
			?>


		<!-- Ex 4 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>

			# Ex 4 :
			# Check the existence of each parameter using the PHP function 'isset'.
			# Check the blankness of an element in $_POST by comparing it to the empty string.
			# (can also use the element itself as a Boolean test!)
			# if (){
		-->

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		# } elseif () {
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		# } elseif () {
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		-->

		<?php
		# if all the validation and check are passed
		# } else {
		?>


		<!-- Ex 2: display submitted data -->



		<!-- Ex 3 :
			<p>Here are all the loosers who have submitted here:</p>

			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */


		 	Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->


		<?php
		# }
		?>

		<?php

			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */

		?>
	</body>
</html>
