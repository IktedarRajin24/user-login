<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	</style>
</head>
<body>
	<?php 

		$firstName = $lastName = $gender = $email = $username = $password = $remail ="";
		$firstNameErr = $lastNameErr =  $genderErr = $emailErr = $usernameErr = $passwordErr = $remailErr ="";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the firstname";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the lastname";
			}
			else {

				$lastName = trim($_POST['lname']);
				$lastName = htmlspecialchars($_POST['lname']);
			}

			if (isset($_POST['gender'])) {


      			if ($_POST['gender'] === 'male') {

         			$gender= 'Male';

       			} 
       			else if ($_POST['gender'] === 'female') {

        			$gender='Female';

       			}

    		} 
    		else {
      			 $genderErr= "No radio buttons were selected.";
     		}

			if(empty($_POST['E-mail'])) {
				$emailErr = "Please fill up the email";
			}
			else {
				$email = $_POST['E-mail'];
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				$emailErr = "Invalid email format";
			}

			if(empty($_POST['username'])) {
				$usernameErr = "Please enter a username";
			}
			else {
				$username = $_POST['username'];
			}

			if(empty($_POST['pass'])) {
				$passwordErr = "Please enter a password";
			}
			else {
				$password = $_POST['pass'];
			}

			if(empty($_POST['recE-mail'])) {
				$remailErr = "Please fill up the email";
			}
			
			else {
				$remail = $_POST['recE-mail'];
			}
			if (!filter_var($remail, FILTER_VALIDATE_EMAIL)) {
  				$remailErr = "Invalid email format";
			}


			
		}
	?>

	<h1>Registration Form</h1>

	<form method="POST"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<fieldset><legend>Basic Information</legend>
		<p>
			<label for="FirstName">Firstname:</label>
			<input type="text" name="fname" id="fname" value="<?php echo $firstName ?>">
			<p><?php echo $firstNameErr; ?></p>
			<br>

			<label for="LastName">Lastname:</label>
			<input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
			<p><?php echo $lastNameErr; ?></p>
			<br>

			<label>Gender:</label>
			<input type="radio" name="gender" id="male" value="male">
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="female">
			<label for="female">Female</label>
			<p><?php echo $genderErr; ?></p>
			<br>

			<label for="E-mail">E-mail:</label>
			<input type="email" name="E-mail" id="E-mail" value="<?php echo $email ?>">
			<p><?php echo $emailErr; ?></p>
			<br>
		</p>
		</fieldset>

		<fieldset><legend>User Account Information</legend>
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?php echo $username ?>">
			<p><?php echo $usernameErr; ?></p>
			<br>

			<label for="Password">Password</label>
			<input type="password" name="pass" id="pass" value="<?php echo $password?>">
			<p><?php echo $passwordErr; ?></p>
			<br>

			<label for="E-mail">Recovery E-mail:</label>
			<input type="email" name="recE-mail" id="recE-mail" value="<?php echo $remail ?>">
			<p><?php echo $remailErr; ?></p>
			<br>

		</p>
		</fieldset>

		<input type="submit" value="Submit">Submit
		<br>
	</form>

	<?php 
		echo "<h2>Details stored:</h2>";
		echo "firstname is:" .$firstName;
		echo "<br>";
		echo "lastname is:" .$lastName;
		echo "<br>";
		echo "gender:" .$gender;
		echo "<br>";
		echo "email:" .$email;
		echo "<br>";
		echo "username is:" .$username;
		echo "<br>";
		echo "password:" .$password;
		echo "<br>";
		echo "recovery e-mail is:" .$remail;
		echo "<br>";

		$f= fopen("Userinfo.txt", "a");

		fwrite($f, $firstName." ".$lastName."\n ". $gender."\n ".$email."\n  ".$username." \n ".$password." \n ".$remail );


	?>

</body>
</html>