<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$naam = $_POST['naam'];
		$user_id = $_POST['user_id'];
		$adres = $_POST['adres'];
		$plaats = $_POST['plaats'];
		$telefoonnr = $_POST['telefoonnr'];
		$email = $_POST['email'];
		$postcode = $_POST['postcode'];

		// write the update query
		$sql = "UPDATE `klant` SET `naam`='$naam',`adres`='$adres',`plaats`='$plaats',`telefoonnr`='$telefoonnr',`email`='$email',`postcode`='$postcode' WHERE `id`='$user_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `klant` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$naam = $row['naam'];
			$adres = $row['adres'];
			$plaats = $row['plaats'];
			$telefoonnr = $row['telefoonnr'];
			$email = $row['email'];
			$postcode = $row['postcode'];
			$id = $row['id'];
		}

	?>
		<h2>User Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Personal information:</legend>
		    First name:<br>
		    <input type="text" name="naam" value="<?php echo $naam; ?>">
		    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
		    <br>
		    Adres:<br>
		    <input type="text" name="adres" value="<?php echo $adres; ?>">
		    <br>
		    Plaats:<br>
		    <input type="text" name="plaats" value="<?php echo $plaats; ?>">
		    <br>
		    Telefoon nummer:<br>
		    <input type="text" name="telefoonnr" value="<?php echo $telefoonnr; ?>">
		    <br>
		    Email:<br>
		    <input type="email" name="email" value="<?php echo $email; ?>">
		    <br>
		    Postcode:<br>
		    <input type="text" name="postcode" value="<?php echo $postcode; ?>">
		    <br><br>
		    <input type="submit" value="Update" name="update"> </form>
		    <form action="http://localhost/all/crud_test/crud/view.php">
		    	<br><input type="submit" value="Go back">
		    </form>
		  </fieldset>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>