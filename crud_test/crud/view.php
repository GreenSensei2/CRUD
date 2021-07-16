<?php 
include "config.php";

//write the query to get data from users table

$sql = "SELECT * FROM klant";

//execute the query

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>users</h2>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Adres</th>
		<th>Plaats</th>
		<th>Telefoon nummer</th>
		<th>Email</th>
		<th>Postcode</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['naam']; ?></td>
					<td><?php echo $row['adres']; ?></td>
					<td><?php echo $row['plaats']; ?></td>
					<td><?php echo $row['telefoonnr']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['postcode']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

        <form action="http://localhost/all/crud_test/crud/create.php">
            <br> <input type="submit" value="Go back">
        </form>

</body>
</html>