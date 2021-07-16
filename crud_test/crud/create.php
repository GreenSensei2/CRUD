<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$naam = $_POST['naam'];
		$adres = $_POST['adres'];
		$plaats = $_POST['plaats'];
		$plaats = $_POST['plaats'];
		$telefoonnr = $_POST['telefoonnr'];
        $email = $_POST['email'];
        $postcode = $_POST['postcode'];

		//write sql query

		$sql = "INSERT INTO `klant`(`naam`, `adres`, `plaats`, `telefoonnr`, `email`, `postcode`) VALUES ('$naam','$adres','$plaats','$telefoonnr','$email','$postcode')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<body>

<h2>Signup Form</h2>

<form action="" method="POST">
  <fieldset>
    <legend>Gegevens invullen:</legend>
    Naam:<br>
    <input type="text" name="naam">
    <br>
    Adres:<br>
    <input type="text" name="adres">
    <br>
    Plaats:<br>
    <input type="text" name="plaats">
    <br>
    Telefoon nummer:<br>
    <input type="text" name="telefoonnr">
    <br>
    Email:<br>
    <input type="text" name="email">
    <br>
    Postcode:<br>
    <input type="text" name="postcode">
    <br><br>
    <input type="submit" name="submit" value="submit">
</form>

<form action="http://localhost/all/crud_test/crud/view.php">
    <br>
    <input type="submit" value="Update and Delete">
</form>
</fieldset>
</body>
</html>